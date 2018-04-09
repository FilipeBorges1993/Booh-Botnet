
#Dead Functions Objectes
deadFunction = [
                {
                    'header':
                                {
                                    'type':'void',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n','char':{'onOff':'n','value':'0'}},
                                                            {'type':'string','name':'varNameRandom_2','pointer':'n','char':{'onOff':'n','value':'0'}},
                                                       ],
                                },


                    'content': [
                                    {'line':'string content_varRandom_1 = randomTextGenerator() ;'},
                                    {'line':'randomCodeGenerator() '},
                                    {'line':'char content_varRandom_3[] = randomTextGenerator() ;'},
                                    {'line':'string content_varRandom_2 = randomTextGenerator();'},
                                    {'line':'for (int i = 0; i < &randomIntTriggerFunction(); i++){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_2[i] = content_varRandom_1[i] ^content_varRandom_3[i % (sizeof(string(randomTextGenerator())) /sizeof(char))];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'};'},
                                    {'line':'}'}
                                ],

                    'return': 'funcNameRandom_1(randomTextGenerator(),randomTextGenerator())'
                    },
                {
                    'header':
                               {
                                        'type':'void',
                                        'function_name':'funcNameRandom_1',
                                        'function_params':
                                                           [
                                                                {'type':'string','name':'varNameRandom_1','pointer':'n','char':{'onOff':'n','value':'0'}},

                                                           ],},

                    'content': [
                                        {'line':'string content_varRandom_1 = randomTextGenerator() ;'},
                                        {'line':'randomCodeGenerator() '},
                                        {'line':'content_varRandom_1 = "Hello World" ;'},
                                        {'line':'randomCodeGenerator() '},
                                        {'line':'cout << content_varRandom_1 << endl;\n}'}
                                    ],

                    'return': 'funcNameRandom_1(randomTextGenerator())'
                    }
               ]


#Dead Code
deadCodeLine = [
                {'line': 'string randomiZeMe() = "Son agreed others exeter period myself few yet nature.";'},
                {'line': 'string randomiZeMe() = "Off melancholy alteration principles old. Is do speedily kindness";'},
                {'line': 'string randomiZeMe() = "Love you Bitch";'},
                {'line': 'char randomiZeMe()[] = "Kill in the name off";'},
                {'line': 'int randomiZeMe() = 5;'},
                {'line': 'int randomiZeMe();'},
                {'line': 'int randomiZeMe() = 555432;'},
                {'line': 'int randomiZeMe() = 123135;'},
                {'line': 'int randomiZeMe() = 53321231235;'},
                {'line': 'int randomiZeMe() = 12315;'},
                {'line': 'int randomiZeMe() = 3;'},
                {'line': 'string randomiZeMe() = "fier for the vari";'},
                {'line': 'string randomiZeMe() = "as having an auto type; therefore, the type of bar is the type of the value used to initialize it: in this case it uses the type of foo, which is int.";'},
                {'line': 'string randomiZeMe() = "atures recently a";'},
                {'line': 'string randomiZeMe() = "ode, one has to search for the typ";'},
                {'line': 'char randomiZeMe()[] = "ASsfasf asfa sfasFasfasf asfka skfa sfjasf asj fasfa ";'},
                {'line': 'char randomiZeMe()[] = "looll you badda boy";'},
                {'line': 'char randomiZeMe()[] = "Ksdfsdfsgggsfsdfsdff";'},
                {'line': 'char randomiZeMe()[] = "fsdfsdg sdgdfhfg fjghkhkhjkl lh";'},
                {'line': 'char randomiZeMe()[] = "fsdfsdg sdgdfhfg fjghkhkhjkl lh";'},
                {'line': 'float randomiZeMe() = 5.5;'},
                {'line': 'float randomiZeMe() = 2.5;'},
                {'line': 'float randomiZeMe() = 1245.5;'},
                {'line': 'float randomiZeMe() = 1235.43;'},
                {'line': 'float randomiZeMe() = 5641.2;'},
                {'line': 'float randomiZeMe() = 56756.1;'},
                ]
