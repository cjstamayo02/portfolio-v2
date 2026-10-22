import type { Skill } from "@/lib/types";

export default function Skills({ skills }: { skills: Skill[] }) {
  if (!skills.length) return null;

  const groups = new Map<string, string[]>();
  for (const s of skills) {
    groups.set(s.category, [...(groups.get(s.category) ?? []), s.name]);
  }

  return (
    <section id="skills">
      <div className="wrap">
        <div className="eyebrow mono">Stack</div>
        {[...groups.entries()].map(([category, names]) => (
          <div className="stackgroup" key={category}>
            <h4 className="mono">{category}</h4>
            <div className="chips">
              {names.map((n) => (
                <div className="chip" key={n}>
                  {n}
                </div>
              ))}
            </div>
          </div>
        ))}
      </div>
    </section>
  );
}
