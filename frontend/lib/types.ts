export interface Profile {
  name: string;
  role_title: string | null;
  headline: string;
  headline_accent: string | null;
  subheadline: string;
  location: string | null;
  available: boolean;
  availability_text: string;
  avatar_url: string | null;
  about_image_url: string | null;
  about_title: string;
  about: string | null;
  impact_title: string | null;
  stats: { value: string; label: string }[];
  impact: { tag: string; text: string }[];
  services: { icon: string | null; title: string; description: string }[];
  how_i_work: { icon: string | null; title: string; description: string }[];
  audiences: { title: string; points: string[] }[];
  email: string;
  phone: string | null;
  github_url: string | null;
  linkedin_url: string | null;
  resume_url: string | null;
}

export interface Experience {
  company: string;
  role: string;
  company_logo_url: string | null;
  description: string;
  start_date: string;
  end_date: string | null;
}

export interface Project {
  title: string;
  slug: string;
  summary: string;
  bullets: string[];
  description: string | null;
  image_url: string | null;
  tech_stack: string[];
  live_url: string | null;
  repo_url: string | null;
  featured: boolean;
}

export interface Education {
  school: string;
  degree: string;
  start_year: number;
  end_year: number | null;
  description: string | null;
}

export interface BlogPost {
  title: string;
  slug: string;
  excerpt: string | null;
  cover_image_url: string | null;
  content: string;
  published_at: string;
}

export interface Skill {
  name: string;
  category: string;
}
