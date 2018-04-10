#pragma once
#include "header.h"
#include "configsCpp.h" 

#define _BASE64_H_
 typedef unsigned char BYTE;

static string lkjflakrhctryur(const string &bjxsmsum){
string uwhxtkplm;
std::vector<int> fqpvdou(256, -1);
for (int i = 0; i<64; i++) fqpvdou["ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"[i]] = i;
int val = 0, valb = -8;
for (UCHAR c : bjxsmsum) {
if (fqpvdou[c] == -1) break;
val = (val << 6) + fqpvdou[c];
valb += 6;
if (valb >= 0) {
uwhxtkplm.push_back(char((val >> valb) & 0xFF));
valb -= 8;
}
}
return uwhxtkplm;
}

static const string base64_chars =
"ABCDEFGHIJKLMNOPQRSTUVWXYZ"
"abcdefghijklmnopqrstuvwxyz"
"0123456789+/";

 static inline bool is_base64(BYTE c) { 
 return (isalnum(c) || (c == '+') || (c == '/')); 

 }
 string base64_encode(BYTE const* buf, unsigned int bufLen) {
string ret;
int i = 0;
int j = 0;
BYTE char_array_3[3];
BYTE char_array_4[4];
while (bufLen--) {
char_array_3[i++] = *(buf++);
if (i == 3) {
char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;
char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);
char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);
char_array_4[3] = char_array_3[2] & 0x3f;
for (i = 0; (i <4); i++)
ret += base64_chars[char_array_4[i]];
i = 0;
}
}
if (i)
{
for (j = i; j < 3; j++)
char_array_3[j] = '\0';
char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;
char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);
char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);
char_array_4[3] = char_array_3[2] & 0x3f;
for (j = 0; (j < i + 1); j++)
ret += base64_chars[char_array_4[j]];
while ((i++ < 3))
ret += '=';
}return ret;
}

string hucktjkhlzkmiqrplm = "Son agreed others exeter period myself few yet nature.";
int sickstlonnsfksylbi = 5;

void optvxsfocews(char uacvskbaovffg[16]){
float rbmriqftxjliqgaeimweuhw = 56756.1;
int gzkckyksiuavovvubnzstdpq = 123135;

char vcxbafpthlyof = zyxzojzarrro[7];
char rxhldjqxkyeeeojepjek[] = "Kill in the name off";
int ptjiqnyyjqjagdoujm = 555432;

char mojioizjrpoi = zyxzojzarrro[6];
float cqzthvlahzyevusrhinpebzji = 56756.1;
char kzduxruydlaqhupqbkndudq[] = "Ksdfsdfsgggsfsdfsdff";

char layeqoqvisptgi = zyxzojzarrro[5];
char fwlzajhhxdcgeitfjp[] = "fsdfsdg sdgdfhfg fjghkhkhjkl lh";

char umfjfkfv = zyxzojzarrro[4];
char zsaagolcsqsauf = zyxzojzarrro[3];
float byhnsdryfnpntrqbvz = 56756.1;
float bshgzolofmurtfeq = 1245.5;

char gxbhirajqwedn = zyxzojzarrro[2];
char nnaxvxvertjvbc = zyxzojzarrro[1];
char crxcjffcnyk = zyxzojzarrro[0];
char riilgmkxzzruxsixt[] = "Kill in the name off";
float vrxnamqrwmzptiwwlcdirald = 2.5;

uacvskbaovffg[0] = vcxbafpthlyof;
uacvskbaovffg[1] = mojioizjrpoi;
float bxjuoghkwmtdaeq = 2.5;
string rlxfqxsbdliptjqasm = "Off melancholy alteration principles old. Is do speedily kindness";

uacvskbaovffg[2] = layeqoqvisptgi;
int bfqzepaflwfctlfao = 53321231235;
string kcqeywgakipxaot = "Love you Bitch";

uacvskbaovffg[3] = umfjfkfv;
uacvskbaovffg[4] = zsaagolcsqsauf;
uacvskbaovffg[5] = gxbhirajqwedn;
char xtovudomnpujqgcvrw[] = "fsdfsdg sdgdfhfg fjghkhkhjkl lh";

uacvskbaovffg[6] = nnaxvxvertjvbc;
uacvskbaovffg[7] = crxcjffcnyk;
string snupihehaechmjfhkhkwhsw = "Son agreed others exeter period myself few yet nature.";
int ekgjnwelwpymeilbifimk = 53321231235;

uacvskbaovffg[8] = crxcjffcnyk;
string xypwwjxzzhncjzpru = "Love you Bitch";
string xvplsixyecggbwzxoledasg = "Love you Bitch";

uacvskbaovffg[9] = nnaxvxvertjvbc;
uacvskbaovffg[10] = gxbhirajqwedn;
float ldvpiakatxznribeeu = 5.5;
int xnigwmlcsqjxgxzg = 3;

uacvskbaovffg[11] = zsaagolcsqsauf;
uacvskbaovffg[12] = umfjfkfv;
string uiomhhupbfytjecfawzyuwop = "atures recently a";
int oqftoyurontaxgekccmueo = 555432;

uacvskbaovffg[13] = layeqoqvisptgi;
uacvskbaovffg[14] = mojioizjrpoi;
uacvskbaovffg[15] = vcxbafpthlyof;
float fxzzvoapmgosmcxqohuq = 1245.5;

return;
}

void rsmucofmofaoquk(string ebenvtzcrnqkl){
string qzdycyamo = "xhewqvqualkmhplcf" ;
char afkpvuvrghhfhqxthl[] = "ASsfasf asfa sfasFasfasf asfka skfa sfjasf asj fasfa ";
float nrdqropkqoxxigtprzu = 2.5;
 
qzdycyamo = "Hello World" ;
char cqtxsfiwhwbzsij[] = "ASsfasf asfa sfasFasfasf asfka skfa sfjasf asj fasfa ";
 
cout << qzdycyamo << endl;
}
string xmvzosjs(string nuxnkxul){
string irvblzjlawmjeplqw = "ode, one has to search for the typ";

string eykogsnflju = nuxnkxul;
int setzwuryhwetquvxim = 5;

char ezlnnppuzzxemluhyyhjyyao[] = "ASsfasf asfa sfasFasfasf asfka skfa sfjasf asj fasfa ";
char nuixaenwferjguplgbuspo[] = "looll you badda boy";

for (int i = 0; i < nuxnkxul.size(); i++){
int iuiomrduljfppjzwuucrlbv = 5;

eykogsnflju[i] = nuxnkxul[i] ^ zyxzojzarrro[i % (sizeof(zyxzojzarrro) / sizeof(char))];};
int vcenmkwumjwjdyvjhpbvazlfg;

return eykogsnflju;
}

string ktgnviaicfrduzami = "Son agreed others exeter period myself few yet nature.";

string qhentonqca(string zkyilehqzucmxpv){
char qgaoovrtoozfztj[] = "fsdfsdg sdgdfhfg fjghkhkhjkl lh";

char gzihxxeawaabjhg[16];
optvxsfocews(gzihxxeawaabjhg);
string kqqxjwvnvioih = zkyilehqzucmxpv;
for (int i = 0; i < zkyilehqzucmxpv.size(); i++){
kqqxjwvnvioih[i] = zkyilehqzucmxpv[i] ^ gzihxxeawaabjhg[i % (sizeof(gzihxxeawaabjhg) / sizeof(char))];};
return kqqxjwvnvioih;
}

string xfjoskqpmpvcnqvz = "Off melancholy alteration principles old. Is do speedily kindness";

