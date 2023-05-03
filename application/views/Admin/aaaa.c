
#include<stdio.h>
#include<conio.h>

void main()
{
int i,j,k[5],count=0,istop,jstop,stop,flag=0,plen,mod,devide;
char p[100],p1[5][20],newm[5][20],e[100],d[100];

printf("Masukkan PlainText:");
gets(p);

for(i=0;i<20;i++)
{ for(j=0;j<5;j++)
  { if(p[count]!=32&&p[count]!='\0')
    p1[i][j]=p[count++];

    else if(p[count]==32)
    count++;

    else
    {istop=i;jstop=j;
     flag=1;
     break;
    }
  }
  if(flag==1)
  break;
}
flag=0;

for(i=0;i<20;i++)
{ printf("\n");
  if(i==istop)
  {stop=jstop;
  flag=1;
  }
  else
  stop=5;

  for(j=0;j<stop;j++)
  {printf("%c",p1[i][j]);
  }
  if(flag==1)
  break;
}

p1[i][j]='\0';
plen=istop*5+jstop;
//printf("%d",plen);

printf("\nMasukkan kunci urutan dari 1-5");

for(i=0;i<5;i++)
scanf("%d",&k[i]);

//ENCRYPTION PART:::::::::::::::::::::::::::::::::::::::::::::::
count=0;
for(i=0;i<5;i++)
{ for(j=0;j<20;j++)
  {
    if(p1[j][k[i]-1]!='\0')
    {e[count]=p1[j][k[i]-1];
    e[count+1]='\0';
    count++;
    }

    else
    break;
  }
}
printf("\n ENCRYPTED TEXT:");
for(i=0;i<plen;i++)
printf("%c",e[i]);



//DECRTYPTION PART:::::::::::::::
devide=plen/5;
mod=plen%5;
count=0;

for(i=0;i<5;i++)
{ printf("\n");
  for(j=0;j<devide+1;j++)
  {
     if(j==devide&&k[i]>mod)
     newm[j][i]='\0';

     else
    newm[j][i]=e[count++];

  }
}

for(i=0;i<devide+1;i++)
{ printf("\n");
  for(j=0;j<5;j++)
  {
    printf("%c",newm[i][j]);
  }
}

count=0;
for(i=0;i<devide+1;i++)
{
for(j=0;j<5;j++)
  {
    if(newm[i][k[j]-1]!='\0')
    {d[count]=newm[i][k[j]-1];
    d[count+1]='\0';
    count++;
    }
  }
}
d[count]='\0';
printf("\n DECRYPTED TEXT:");
for(i=0;i<plen;i++)
printf("%c",d[i]);

//printf("%d",'\0');
getch();
}
