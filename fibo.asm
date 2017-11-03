data segment 
n db 10
data ends

CODE SEGMENT
ASSUME  CS:CODE,DS:DATA

START:
MOV AX,DATA  ;INTIALIZATION
MOV DS,AX

mov cl,n;
mov bl,1
mov bh,0
up:mov al,bh
add bh,bl
mov bl,al
call disphexa
loop up
mov ah,4ch
int 21h

 
disphexa proc
mov dl,bl
mov cl,04h
shr dl,cl
cmp dl,09h
   jbe l1
   add dl,07h
l1:add dl,30h
   mov ah,02h
   int 21h
   mov dl,bl
   and dl,0FH
cmp dl,09h
   jbe l3
   add dl,07h
l3:add dl,30h
   mov ah,02h
   int 21h
   ret
disphexa endp
code ends
end start
