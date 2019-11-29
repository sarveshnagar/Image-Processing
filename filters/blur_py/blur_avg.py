import cv2
import sys

image='../../images/'+sys.argv[1]

img=cv2.imread(image, cv2.IMREAD_UNCHANGED)
row=int(sys.argv[3])
col=int(sys.argv[4])
blur=cv2.blur(img,(row,col))

tmp=sys.argv[1]
ext=sys.argv[2]
name=tmp[:len(tmp)-len(ext)-1]
output=name+'_blur_avg'+'.'+ext
target='../../images/'+output

if cv2.imwrite(target, blur): print(output,end='')
else: print('failed',end='')
