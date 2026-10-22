import type { Profile } from "@/lib/types";

export default function Stats({ stats }: { stats: Profile["stats"] }) {
  if (!stats.length) return null;
  return (
    <div className="wrap">
      <div className="stats">
        {stats.map((s) => (
          <div className="stat" key={s.label}>
            <b>{s.value}</b>
            <span>{s.label}</span>
          </div>
        ))}
      </div>
    </div>
  );
}
