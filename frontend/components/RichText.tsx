import sanitizeHtml from "sanitize-html";

export default function RichText({
  html,
  className = "",
}: {
  html: string;
  className?: string;
}) {
  const clean = sanitizeHtml(html, {
    allowedTags: [...sanitizeHtml.defaults.allowedTags, "img"],
    allowedSchemes: ["http", "https", "mailto"],
    transformTags: {
      a: sanitizeHtml.simpleTransform("a", { rel: "noopener noreferrer" }),
    },
  });
  return (
    <div
      className={`richtext ${className}`}
      dangerouslySetInnerHTML={{ __html: clean }}
    />
  );
}
