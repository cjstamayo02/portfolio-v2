import Link from "next/link";
import { getBlogPosts } from "@/lib/api";
import { fullDate } from "@/lib/format";

export const metadata = { title: "Blog" };

export default async function BlogIndex() {
  const posts = await getBlogPosts();

  return (
    <main className="wrap page">
      <Link href="/" className="backlink">
        ← Home
      </Link>
      <div className="eyebrow mono">Blog</div>
      {posts.length === 0 ? (
        <p style={{ color: "var(--sub)" }}>No posts yet.</p>
      ) : (
        <div className="casegrid">
          {posts.map((post) => (
            <div className="case" key={post.slug}>
              <div className="casenum mono">{fullDate(post.published_at)}</div>
              <h3>
                <Link href={`/blog/${post.slug}`}>{post.title}</Link>
              </h3>
              {post.excerpt && <p>{post.excerpt}</p>}
              <Link className="visit" href={`/blog/${post.slug}`}>
                Read post →
              </Link>
            </div>
          ))}
        </div>
      )}
    </main>
  );
}
