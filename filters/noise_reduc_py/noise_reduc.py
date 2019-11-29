import cv2
import sys

image='../../images/'+sys.argv[1]

img = cv2.imread(image, cv2.IMREAD_UNCHANGED)

# Denoising
dst = cv2.fastNlMeansDenoisingColored(img,None,10,10,7,21)

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_noise_reduc'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target, dst): print(output,end='')
else: print('failed',end='')
