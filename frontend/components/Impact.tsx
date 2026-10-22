import type { Profile } from "@/lib/types";

export default function Impact({
  title,
  items,
}: {
  title: string | null;
  items: Profile["impact"];
}) {
  if (!items.length) return null;
  return (
    <section style={{ paddingBottom: 0 }}>
      <div className="wrap">
        {title && <div className="eyebrow mono">{title}</div>}
        <div className="impact">
          {items.map((i) => (
            <div className="impact-card" key={i.tag}>
              <div className="tag mono">{i.tag}</div>
              <p>{i.text}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
