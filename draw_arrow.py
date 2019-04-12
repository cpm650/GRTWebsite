from PIL import Image,ImageDraw

depth=30
sep=20
n=100
m=75
arrow=Image.new('RGBA',(n,m),color='rgba(0,0,0,0)')
arrow_draw=ImageDraw.Draw(arrow)
arrow_draw.line((0,0,n/2,depth),width=5,fill='rgba(255,255,255,255)')
arrow_draw.line((n/2-1,depth,n-1,0),width=5,fill='rgba(255,255,255,255)')
arrow_draw.line((0,sep,n/2,depth+sep),width=5,fill='rgba(255,255,255,255)')
arrow_draw.line((n/2-1,depth+sep,n-1,sep),width=5,fill='rgba(255,255,255,255)')
arrow.save('imageAssets/icons/arrow.png')
