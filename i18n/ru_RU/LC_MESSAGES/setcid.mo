��          �      l      �     �     �  ;        @     N     ^     e     q     }     �     �     �     �     �  �  �     �     �  �   �  �   �  K   i  �  �     �  *   �  z   �     r	     �	     �	     �	     �	     �	  4   �	     
  0   8
  
   i
  "   t
  �  �
     c  %   v  g  �  o       t        
                            	                                                              Add CallerID Add CallerID Instance Adds the ability to change the CallerID within a call flow. CallerID Name CallerID Number Delete Description Destination Edit Edit CallerID Instance Edit:  Invalid description specified Reset Set CallerID %s:  Set CallerID allows you to change the caller id of the call and then continue on to the desired destination. For example, you may want to change the caller id form "John Doe" to "Sales: John Doe". Please note, the text you enter is what the callerid is changed to. To append to the current callerid, use the proper asterisk variables, such as "${CALLERID(name)}" for the currently set callerid name and "${CALLERID(num)}" for the currently set callerid number. Submit Submit Changes The CallerID Name that you want to change to. If you are appending to the current callerid, dont forget to include the appropriate asterisk variables. If you leave this box blank, the CallerID name will be blanked The CallerID Number that you want to change to. If you are appending to the current callerid, dont forget to include the appropriate asterisk variables. If you leave this box blank, the CallerID number will be blanked The descriptive name of this CallerID instance. For example "new name here" Project-Id-Version: 1.0
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2015-10-29 18:47-0700
PO-Revision-Date: 2015-07-21 16:27+0200
Last-Translator: Yuriy <alliancesko@gmail.com>
Language-Team: Russian <http://weblate.freepbx.org/projects/freepbx/setcid/ru_RU/>
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Language: ru_RU
Plural-Forms: nplurals=3; plural=n%10==1 && n%100!=11 ? 0 : n%10>=2 && n%10<=4 && (n%100<10 || n%100>=20) ? 1 : 2;
X-Generator: Weblate 2.2-dev
 Добавить CallerID Добавить значение CallerID Добавляет возможность изменения CallerID во время прохождения вызова. Имя CallerID Номер CallerID Удалить Описание Назначение Редактировать Редактировать значение CallerID Редактировать:  Указано неверное описание Сброс Установить CallerID %s:  Установка CallerID позволяет изменить его во время вызова и доставить звонок по назначению. Например, Вы хотите изменить CallerID имя с "John Doe" на "Sales: John Doe". Надо учесть, что CallerID изменится на то значение, которое будет введено в поле ниже. Присоединять значения к уже существующему CallerID можно с помощью переменнных Астериск, таких как "${CALLERID(name)}" - для изменения имени и "${CALLERID(num)}" -для изменения номера. Сохранить Сохранить изменения CallerID имя, на которое хотите изменять. Если это дополняется к существующему CallerID, то не забывайте включить это во все назначенные Asterisk переменные. Если оставить поле пустым, то CallerID имя будет пустым CallerID номер, на который хотите изменять. Если это дополняется к существующему CallerID, то не забывайте включить это во все назначенные Asterisk переменные. Если оставить поле пустым, то CallerID номер будет пустым Понятное название для этого значения CallerID. Например - "Новое название" 