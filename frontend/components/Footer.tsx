import type { Profile } from "@/lib/types";

export default function Footer({ profile }: { profile: Profile }) {
  return (
    <footer>
      <div className="wrap">
        {profile.linkedin_url ? (
          <a
            href={profile.linkedin_url}
            target="_blank"
            rel="noopener noreferrer"
          >
            LinkedIn
          </a>
        ) : (
          <span />
        )}
        <span>
          &copy; {new Date().getFullYear()} {profile.name}
        </span>
        <span>Designed to be keyboard-friendly and high-contrast</span>
      </div>
    </footer>
  );
}
