import { initials } from "@/lib/format";
import Img from "./Img";
import RichText from "./RichText";
import type { Profile } from "@/lib/types";

export default function About({ profile }: { profile: Profile }) {
  if (!profile.about) return null;
  return (
    <section id="about">
      <div className="wrap">
        <div className="aboutgrid">
          {profile.avatar_url ? (
            <Img
              className="heroimg"
              src={profile.avatar_url}
              alt={profile.name}
            />
          ) : (
            <div className="heroimg imgph">{initials(profile.name)}</div>
          )}
          <div>
            <div className="eyebrow mono">About me</div>
            <h2>{profile.about_title}</h2>
            <RichText html={profile.about} />
          </div>
        </div>
      </div>
    </section>
  );
}
