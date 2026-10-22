import type {
  BlogPost,
  Education,
  Experience,
  Profile,
  Project,
  Skill,
} from "./types";

const API_URL = (
  process.env.API_URL ??
  process.env.NEXT_PUBLIC_API_URL ??
  "http://127.0.0.1:8000"
).replace(/\/$/, "");

export class ApiNotFoundError extends Error {}

const sleep = (ms: number) => new Promise((r) => setTimeout(r, ms));

async function apiFetch<T>(path: string, revalidate = 3600): Promise<T> {
  let lastError: unknown;

  for (let attempt = 1; attempt <= 3; attempt++) {
    try {
      const res = await fetch(`${API_URL}${path}`, {
        headers: { Accept: "application/json" },
        next: { revalidate },
        signal: AbortSignal.timeout(60_000),
      });
      if (res.status === 404) throw new ApiNotFoundError(path);
      if (!res.ok) throw new Error(`HTTP ${res.status}`);
      const json = await res.json();
      return json.data as T;
    } catch (error) {
      if (error instanceof ApiNotFoundError) throw error;
      lastError = error;
      if (attempt < 3) await sleep(2000 * attempt);
    }
  }

  throw new Error(
    `API request failed: ${API_URL}${path} (${String(lastError)})`,
  );
}

export const getProfile = () => apiFetch<Profile>("/api/profile");
export const getExperiences = () => apiFetch<Experience[]>("/api/experiences");
export const getProjects = () => apiFetch<Project[]>("/api/projects");
export const getProject = (slug: string) =>
  apiFetch<Project>(`/api/projects/${slug}`);
export const getEducation = () => apiFetch<Education[]>("/api/education");
export const getSkills = () => apiFetch<Skill[]>("/api/skills");
export const getBlogPosts = () => apiFetch<BlogPost[]>("/api/blog-posts");
export const getBlogPost = (slug: string) =>
  apiFetch<BlogPost>(`/api/blog-posts/${slug}`);
