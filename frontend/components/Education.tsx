import type { Education as EducationType } from "@/lib/types";

export default function Education({ items }: { items: EducationType[] }) {
  if (!items.length) return null;
  return (
    <section>
      <div className="wrap">
        <div className="eyebrow mono">Education</div>
        <div className="timeline">
          {items.map((e) => (
            <div className="trow" key={`${e.school}-${e.start_year}`}>
              <div>
                <h3>{e.degree}</h3>
                <p>{e.school}</p>
                {e.description && <p>{e.description}</p>}
              </div>
              <div className="when mono">
                {e.start_year} – {e.end_year ?? "Present"}
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
