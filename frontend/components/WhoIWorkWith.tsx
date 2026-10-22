import type { Profile } from "@/lib/types";

export default function WhoIWorkWith({
  audiences,
}: {
  audiences: Profile["audiences"];
}) {
  if (!audiences.length) return null;
  return (
    <section>
      <div className="wrap">
        <div className="eyebrow mono">Who I work with</div>
        <div className="who">
          {audiences.map((a) => (
            <div className="who-card" key={a.title}>
              <h3>{a.title}</h3>
              <ul>
                {a.points.map((p) => (
                  <li key={p}>{p}</li>
                ))}
              </ul>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
