import Link from "next/link";
import ThemeToggle from "./ThemeToggle";
import { initials } from "@/lib/format";

export default function Nav({ name }: { name: string }) {
  return (
    <nav>
      <div className="wrap">
        <Link href="/" className="brand">
          <div className="logo">{initials(name)}</div> {name}
        </Link>
        <div className="navlinks">
          <Link href="/#work">Work</Link>
          <Link href="/#about">About</Link>
          <Link href="/#blog">Blog</Link>
          <Link href="/#skills">Stack</Link>
          <Link href="/#contact">Contact</Link>
          <ThemeToggle />
        </div>
      </div>
    </nav>
  );
}
