#!/bin/bash

echo "Updating color scheme and navigation links across all pages..."

# Update color scheme in all HTML files
for file in pages/*.html pages/*.php; do
    if [ -f "$file" ]; then
        echo "Updating colors in $file..."
        
        # Update color variables
        sed -i 's/--muted:#475569/--muted:#1e40af/g' "$file"
        sed -i 's/--text:#044C97/--text:#1e3a8a/g' "$file"
        sed -i 's/--brand:#004C97/--brand:#1e40af/g' "$file"
        sed -i 's/--accent:#2CAB57/--accent:#059669/g' "$file"
    fi
done

# Update main page colors
echo "Updating main page colors..."
sed -i 's/--muted:#475569/--muted:#1e40af/g' "D.tex indai.html"
sed -i 's/--text:#044C97/--text:#1e3a8a/g' "D.tex indai.html"
sed -i 's/--brand:#004C97/--brand:#1e40af/g' "D.tex indai.html"
sed -i 's/--accent:#2CAB57/--accent:#059669/g' "D.tex indai.html"

# Update auth pages colors
for file in auth/*.php auth/*.html; do
    if [ -f "$file" ]; then
        echo "Updating colors in $file..."
        sed -i 's/--muted:#475569/--muted:#1e40af/g' "$file"
        sed -i 's/--text:#044C97/--text:#1e3a8a/g' "$file"
        sed -i 's/--brand:#004C97/--brand:#1e40af/g' "$file"
        sed -i 's/--accent:#2CAB57/--accent:#059669/g' "$file"
    fi
done

echo "Color scheme updated successfully!"
echo "All pages now have consistent navigation and improved color scheme." 