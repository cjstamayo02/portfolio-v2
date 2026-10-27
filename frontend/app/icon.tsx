// app/icon.tsx
import { ImageResponse } from "next/og";

export const size = { width: 64, height: 64 };
export const contentType = "image/png";

export default function Icon() {
  return new ImageResponse(
    <div
      style={{
        width: "100%",
        height: "100%",
        display: "flex",
        alignItems: "center",
        justifyContent: "center",
        background: "#1B3A6B",
        color: "#fff",
        fontSize: 20,
        fontWeight: 700,
        letterSpacing: -1,
        borderRadius: 14,
        fontFamily: "sans-serif",
      }}
    >
      CJST
    </div>,
    size,
  );
}
