# #!/bin/bash

for file in *.*; do
    #comparing the file types in the directory to the first 2 parameters passed
    if [[  "${file: -4}" = "$1" || "${file: -4}" = "$2"  ]]; then
        #converting such files to the type of the first parameter using the FFMPEG comand
        ffmpeg -i "$file" "${file%.*}$3"
    fi
done