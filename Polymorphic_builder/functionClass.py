import random, string
from random import randint
from deadFunctionsObject import *
from configs import *
from otherFunction import *


#Function Calss
class functionClass:

    def __init__(self, array,file_):
        self.header = array['header']
        self.content = array['content']
        self.f_return = array['return']
        self.append_file = file_
        self.func_phase = ""
        self.r_s_m = {}

#Build the header Code Line and record it on array
    def header_constructor(self):
        ##Generate the random_function_name and save it where we can use it
        self.r_s_m['function_name'] = random_string(randint(7, 15));

        ##Construct paragrams
        p = "";
        for (i, param) in enumerate(self.header['function_params']):
            ##Declare varNameRandom_ and typing it on an phaser
            self.r_s_m['varNameRandom_'+str(i+1)] = random_string(randint(7, 15))
            p = p  + param['type'] + ' ' + check_pointer(param['pointer']) + self.r_s_m['varNameRandom_'+str(i+1)] + check_char_array(param['char']) + smiColHelper(len(self.header['function_params']),i+1)

        ##Wright to line
        heard_build = str(self.header['type'])+' '+ self.r_s_m['function_name']+'('+str(p)+'){';


        ##Add to main function String
        self.func_phase = heard_build + '\n'
        return self.func_phase

#Return the function name and paragres to call function
    def return_constructor(self):

        return_data = self.f_return.replace('funcNameRandom_1', self.r_s_m['function_name'])

        return_data = return_data.replace('randomTextGenerator()', '"'+random_string(randint(15, 25))+'"')


        return return_data

#Counstruct the function content
    def content_constructor(self):

        somthing_to_test = 0;
        ##Create an loop on all lines
        for (i, codeline) in enumerate(self.content):

            #Replace randomCodeGenerator() to random code lines
            codeline['line'] = codeline['line'].replace('randomCodeGenerator()', random_code_gen())

            #Replace &randomIntTriggerFunction to random int
            codeline['line'] = codeline['line'].replace('&randomIntTriggerFunction()', str(randint(3, 10)))

            #Replace Word "cout_var_random"
            codeline['line'] = self.replace_word('content_varRandom_',codeline['line'])

            #Replace word  "randomiZeMe()" ->verify it it is not in use
            codeline['line'] = randomiZeMeHellper(codeline['line'])

            #Replace Word "varNameRandom_"
            codeline['line'] = self.replace_word('varNameRandom_',codeline['line'])

            #Replace randomTextGenerator() -> to an text random generator
            codeline['line'] = codeline['line'].replace('randomTextGenerator()', '"'+random_string(randint(15, 25))+'"')

            #Replace word to the arrays ones
            codeline['line'] = replace_array_vars_function(codeline['line'])

            #Add code line to func_phase
            self.func_phase = self.func_phase + codeline['line'] + '\n'

        return self.func_phase;

#Check the r_s_m for an array
    def rsm_array_constructor(self,word):
        ##Check if in the array have the word define, if not make it
        if word in self.r_s_m:
            return self.r_s_m[word]
        else:
            self.r_s_m[word] = random_string(randint(7, 15));
            return self.r_s_m[word];

#replace word on phaser
    def replace_word(self,word, codeLine):

        cout = 1;
        while cout == 1:
            if word in codeLine:
                varName = word + codeLine.split(word,1)[1][0]
                codeLine = codeLine.replace(varName , self.rsm_array_constructor(varName))


            else:
                cout = 0;



        return codeLine

#Append function to file!
    def append_to_file(self):
        with open(self.append_file, 'a') as fn:
            fn.write(self.func_phase)
        return ''




#Function Builder
def function_bulder(array,fileCode):
    ##Call class
    func_class = functionClass(array,fileCode)
    #Constructor Header
    func_class.header_constructor();
    #Constructor Content
    func_class.content_constructor();
    #past it on File
    func_class.append_to_file();
    #return the function to call
    mainReturn = func_class.return_constructor();
    del func_class
    return mainReturn;


##Function Check pointer
def check_pointer(pointer):
     if(pointer == 'y'):
        return '*'
     elif(pointer == '&'):
        return '&'
     else:
        return ''
##char array check_pointer
def check_char_array(array):
    if(array['onOff'] == 'y'):
        return '['+array['value']+']'
    else:
        return ''
