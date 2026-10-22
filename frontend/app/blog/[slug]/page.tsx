import Link from "next/link";
import { notFound } from "next/navigation";
import Img from "@/components/Img";
import RichText from "@/components/RichText";
import { ApiNotFoundError, getBlogPost } from "@/lib/api";
import { fullDate } from "@/lib/format";

export default async function BlogPostPage({
  params,
}: {
  params: Promise<{ slug: string }>;
}) {
  const { slug } = await params;

  let post;
  try {
    post = await getBlogPost(slug);
  } catch (error) {
    if (error instanceof ApiNotFoundError) notFound();
    throw error;
  }

  return (
    <main className="wrap page">
      <Link href="/blog" className="backlink">
        ← All posts
      </Link>
      <div className="pagehead">
        <h1>{post.title}</h1>
        <div className="meta mono">{fullDate(post.published_at)}</div>
      </div>
      {post.cover_image_url && (
        <Img
          className="pagecover"
          src={post.cover_image_url}
          alt={post.title}
        />
      )}
      <RichText html={post.content} />
    </main>
  );
}
