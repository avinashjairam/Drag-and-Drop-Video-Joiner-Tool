# #!/bin/bash
for file in *
 do
	#echo "${file%.*}"
	ffmpeg -i "$file" -qscale 0 "${file%.*}.mpg"
done
