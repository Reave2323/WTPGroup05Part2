find ./images -type f -iname "*.JPG" | while read -r f; do
  magick "$f" -quality 40 "${f%.*}.webp"
done
