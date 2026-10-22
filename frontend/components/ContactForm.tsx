"use client";

import { FormEvent, useState } from "react";

const FORMSPREE_ID = process.env.NEXT_PUBLIC_FORMSPREE_ID;

export default function ContactForm({ email }: { email: string }) {
  const [status, setStatus] = useState<"idle" | "sending" | "sent" | "error">(
    "idle",
  );

  async function onSubmit(e: FormEvent<HTMLFormElement>) {
    e.preventDefault();
    const form = e.currentTarget;
    const data = new FormData(form);

    if (!FORMSPREE_ID) {
      const subject = encodeURIComponent(
        `Message from ${data.get("name") ?? "your portfolio"}`,
      );
      const body = encodeURIComponent(
        `${data.get("message") ?? ""}\n\nFrom: ${data.get("email") ?? ""}`,
      );
      window.location.href = `mailto:${email}?subject=${subject}&body=${body}`;
      return;
    }

    setStatus("sending");
    try {
      const res = await fetch(`https://formspree.io/f/${FORMSPREE_ID}`, {
        method: "POST",
        headers: { Accept: "application/json" },
        body: data,
      });
      if (!res.ok) throw new Error("failed");
      form.reset();
      setStatus("sent");
    } catch {
      setStatus("error");
    }
  }

  const label =
    status === "sending"
      ? "Sending…"
      : status === "sent"
        ? "Sent, thank you!"
        : status === "error"
          ? "Something went wrong, try again"
          : "Send message →";

  return (
    <form onSubmit={onSubmit}>
      <div className="fld">
        <label htmlFor="cf-name">Name</label>
        <input
          id="cf-name"
          name="name"
          type="text"
          placeholder="Your name"
          required
        />
      </div>
      <div className="fld">
        <label htmlFor="cf-email">Email</label>
        <input
          id="cf-email"
          name="email"
          type="email"
          placeholder="you@email.com"
          required
        />
      </div>
      <div className="fld">
        <label htmlFor="cf-message">Message</label>
        <textarea
          id="cf-message"
          name="message"
          placeholder="Your message"
          required
        />
      </div>
      <button className="send" type="submit" disabled={status === "sending"}>
        {label}
      </button>
    </form>
  );
}
