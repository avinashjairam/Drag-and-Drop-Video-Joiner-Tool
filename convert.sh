#!/bin/bash

for file in *.*; 
	do 
		if[ ${file: -4} != ".mp4"]{
			export extension=${file: -4}
			do ffmpeg -i "$file" "${file%.extension}".mp4;


done