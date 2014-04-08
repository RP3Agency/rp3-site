#!/bin/bash

# Five step search and replace with find, sed, and bash (tested on OS X, should work with Linux)

# check usage and parse command line arguments
OPTIND=1
while getopts "n:m:" opt; do
  case "$opt" in
  n)
    human=$OPTARG
    ;;
  m)
    machine=$OPTARG
    ;;
 esac
done

if [ -z "$1" -o -z "$human" -o -z "$machine" ]; then
   echo -e "Usage: cd /path/to/your/theme && $0 -n <Human Readable Name> -m <Machine Readable Name>\n"
   echo -e "Example: '$0 -n \"Twenty Ten\" -m twentyten' will find and replace instances of '_s' with 'Twenty Ten' and 'twentyten' properly within your theme."
   echo -e "This has to be done in a specific order. See the README.\n"
   echo -e "NOTE: if your 'human readable name' contains a space or other special character you must quote or escape it properly."
   exit 1
fi

rmbu() {
	# NOTE: I'm using "sed -i.bu" at an attempt to make this work easily on OS X and Linux...
	#       See this stack overflow thread: http://goo.gl/9zUWiA

	# Remove back up files
	find . -path "./.git*" -prune -o -name "*.bu" -type f -exec rm {} \;
}


# 1) Search for "Text Domain: _s" in style.scss.
find . -path "./.git*" -prune -o -name "style.*css" -exec sed -i.bu 's/Text Domain: _s/Text Domain: '"$machine"'/g' {} \;
rmbu

# 2) Search for '_s' (inside single quotations) to capture the text domain:
find . -path "./.git*" -or -iname "*.png" -or -name "customize.sh" -prune -o -type f -exec sed -i.bu 's/'"'"'_s'"'"'/'"'""$machine""'"'/g' {} \;
rmbu

# 3) Search for _s_ to capture all the function names.  
find . -path "./.git*" -or -iname "*.png" -or -name "customize.sh" -prune -o -type f -exec sed -i.bu 's/_s_/'"$machine"'_/g' {} \;
rmbu


# 4) Search for  _s (with a space before it) to capture DocBlocks.
find . -path "./.git*" -or -iname "*.png" -or -name "customize.sh" -prune -o -type f -exec sed -i.bu 's/ _s/ '"$human"'/g' {} \;
rmbu


# 5) Search for _s- to capture prefixed handles.
find . -path "./.git*" -or -iname "*.png" -or -name "customize.sh" -prune -o -type f -exec sed -i.bu 's/_s-/'"$machine"'-/g' {} \;
rmbu
