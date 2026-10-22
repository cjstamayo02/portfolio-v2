import type { Profile } from "@/lib/types";

export default function HowIWork({ items }: { items: Profile["how_i_work"] }) {
  if (!items.length) return null;
  return (
    <section>
      <div className="wrap">
        <div className="eyebrow mono">How I work</div>
        <div className="grid3">
          {items.map((s) => (
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
