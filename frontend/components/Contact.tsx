import ContactForm from "./ContactForm";
import type { Profile } from "@/lib/types";

export default function Contact({ profile }: { profile: Profile }) {
  return (
    <section id="contact">
      <div className="wrap">
        <div className="contactgrid">
          <div>
            <h2>Let&apos;s build something.</h2>
            <p>
              Have a project, a question, or just want to say hi? Send a
              message.
            </p>
            <a className="cmail" href={`mailto:${profile.email}`}>
              {profile.email}
            </a>
            {profile.phone && <p style={{ marginTop: 14 }}>{profile.phone}</p>}
          </div>
          <ContactForm email={profile.email} />
        </div>
      </div>
    </section>
  );
}
