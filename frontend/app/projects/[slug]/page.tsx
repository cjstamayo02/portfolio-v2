import Link from "next/link";
import { notFound } from "next/navigation";
import Img from "@/components/Img";
import RichText from "@/components/RichText";
import { ApiNotFoundError, getProject } from "@/lib/api";

export default async function ProjectPage({
  params,
}: {
  params: Promise<{ slug: string }>;
}) {
  const { slug } = await params;

  let project;
  try {
    project = await getProject(slug);
  } catch (error) {
    if (error instanceof ApiNotFoundError) notFound();
    throw error;
  }

  return (
    <main className="wrap page">
      <Link href="/#work" className="backlink">
        ← Back to work
      </Link>
      <div className="pagehead">
        <h1>{project.title}</h1>
        <p className="lede">{project.summary}</p>
      </div>
      {project.image_url && (
        <Img
          className="pagecover"
          src={project.image_url}
          alt={project.title}
        />
      )}
      <div
        className="casetags"
        style={{ display: "flex", gap: 6, flexWrap: "wrap", marginBottom: 24 }}
      >
        {project.tech_stack.map((t) => (
          <span
            key={t}
            style={{
              fontSize: 11,
              background: "var(--chip)",
              borderRadius: 999,
              padding: "4px 10px",
            }}
          >
            {t}
          </span>
        ))}
      </div>
      {project.description && <RichText html={project.description} />}
      <p style={{ marginTop: 28, display: "flex", gap: 20 }}>
        {project.live_url && (
          <a
            className="cmail"
            href={project.live_url}
            target="_blank"
            rel="noopener noreferrer"
          >
            Visit live site →
          </a>
        )}
        {project.repo_url && (
          <a
            className="cmail"
            href={project.repo_url}
            target="_blank"
            rel="noopener noreferrer"
          >
            View code →
          </a>
        )}
      </p>
    </main>
  );
}
