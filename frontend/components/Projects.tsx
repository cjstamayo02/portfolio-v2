import Link from "next/link";
import Img from "./Img";
import type { Project } from "@/lib/types";

export default function Projects({ projects }: { projects: Project[] }) {
  if (!projects.length) return null;
  return (
    <section id="work">
      <div className="wrap">
        <div className="eyebrow mono">Selected work: live, in production</div>
        <div className="casegrid">
          {projects.map((p, i) => (
            <div className="case" key={p.slug}>
              {p.image_url && (
                <Img className="casecover" src={p.image_url} alt={p.title} />
              )}
              <div className="casenum mono">
                {String(i + 1).padStart(2, "0")} ·{" "}
                {p.live_url ? "LIVE SITE" : "PROJECT"}
              </div>
              <h3>
                {p.description ? (
                  <Link href={`/projects/${p.slug}`}>{p.title}</Link>
                ) : (
                  p.title
                )}
              </h3>
              <p>{p.summary}</p>
              {p.bullets.length > 0 && (
                <ul>
                  {p.bullets.map((b) => (
                    <li key={b}>{b}</li>
                  ))}
                </ul>
              )}
              <div className="casetags">
                {p.tech_stack.map((t) => (
                  <span key={t}>{t}</span>
                ))}
              </div>
              {p.live_url && (
                <a
                  className="visit"
                  href={p.live_url}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  {p.live_url.replace(/^https?:\/\//, "")} →
                </a>
              )}
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
