/* eslint-disable @next/next/no-img-element */
import type { ImgHTMLAttributes } from "react";

export default function Img(props: ImgHTMLAttributes<HTMLImageElement>) {
  // eslint-disable-next-line jsx-a11y/alt-text
  return <img loading="eager" decoding="async" {...props} />;
}
