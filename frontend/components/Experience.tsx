import Img from "./Img";
import RichText from "./RichText";
import { monthYear } from "@/lib/format";
import type { Experience as ExperienceType } from "@/lib/types";

export default function Experience({
  experiences,
}: {
  experiences: ExperienceType[];
}) {
  if (!experiences.length) return null;
  return (
    <section>
      <div className="wrap">
        <div className="eyebrow mono">Experience</div>
        <div className="timeline">
          {experiences.map((e) => (
            <div className="trow" key={`${e.company}-${e.start_date}`}>
              <div>
                {e.company_logo_url && (
                  <Img
                    className="clogo"
                    src={e.company_logo_url}
                    alt={e.company}
                  />
                )}
                <h3>
                  {e.role}, {e.company}
                </h3>
                <RichText html={e.description} />
              </div>
              <div className="when mono">
                {monthYear(e.start_date)} to {monthYear(e.end_date)}
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
