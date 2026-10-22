import Link from "next/link";
import { fullDate } from "@/lib/format";
import type { BlogPost } from "@/lib/types";

export default function BlogPreview({ posts }: { posts: BlogPost[] }) {
  return (
    <section id="blog">
      <div className="wrap">
        <div className="eyebrow mono">Blog</div>
        {posts.length === 0 ? (
          <p style={{ color: "var(--sub)" }}>No posts yet.</p>
        ) : (
          <div className="casegrid">
            {posts.map((post) => (
              <div className="case" key={post.slug}>
                <div className="casenum mono">
                  {fullDate(post.published_at)}
                </div>
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
        {posts.length > 0 && (
          <p style={{ marginTop: 22 }}>
            <Link
              href="/blog"
              className="visit"
              style={{ color: "var(--accent)", fontWeight: 600, fontSize: 13 }}
            >
              All posts →
            </Link>
          </p>
        )}
      </div>
    </section>
  );
}
