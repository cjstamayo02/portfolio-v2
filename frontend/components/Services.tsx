import type { Profile } from "@/lib/types";

export default function Services({
  services,
}: {
  services: Profile["services"];
}) {
  if (!services.length) return null;
  return (
    <section>
      <div className="wrap">
        <div className="eyebrow mono">What I do</div>
        <div className="grid3">
          {services.map((s) => (
            <div className="svc" key={s.title}>
              {s.icon && <div className="ic">{s.icon}</div>}
              <h3>{s.title}</h3>
              <p>{s.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
