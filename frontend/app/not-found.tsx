import Link from "next/link";

export default function NotFound() {
  return (
    <main className="wrap page">
      <div className="eyebrow mono">404</div>
      <div className="pagehead">
        <h1>Page not found</h1>
      </div>
      <Link href="/" className="cmail">
        ← Back home
      </Link>
    </main>
  );
}
