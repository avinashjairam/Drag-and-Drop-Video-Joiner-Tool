#!/bin/bash
# Merge Script

ffmpeg -f concat -i <(for f in ./*.mp4; do echo "file '$(pwd)/$f'"; done) -c copy chain.mp4

#ffmpeg -f concat -i <( for f in *.wav; do echo "file '$(pwd)/$f'"; done ) output.wav

