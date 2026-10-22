import Img from "./Img";
import { initials } from "@/lib/format";
import type { Profile } from "@/lib/types";

export default function Hero({ profile }: { profile: Profile }) {
  return (
    <header className="hero">
      <div className="wrap">
        <div className="herogrid">
          <div>
            {profile.location && (
              <div className="loc mono">📍 {profile.location}</div>
            )}
            {profile.available && (
              <div className="badge">
                <span className="dot" />
                {profile.availability_text}
              </div>
            )}
            <h1>
              {profile.headline}
              {profile.headline_accent && (
                <span className="accent">{profile.headline_accent}</span>
              )}
            </h1>
            <p className="lede">{profile.subheadline}</p>
            <div className="ctas">
              <a href="#work" className="btn btn-primary">
                View work →
              </a>
              <a href="#contact" className="btn btn-ghost">
                Get in touch
              </a>
            </div>
          </div>
          {profile.avatar_url ? (
            <Img
              className="heroimg"
              src={profile.avatar_url}
              alt={profile.name}
            />
          ) : (
            <div className="heroimg imgph">{initials(profile.name)}</div>
          )}
        </div>
      </div>
    </header>
  );
}
