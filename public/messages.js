/*!
 *  Lang.js for Laravel localization in JavaScript.
 *
 *  @version 1.1.10
 *  @license MIT https://github.com/rmariuzzo/Lang.js/blob/master/LICENSE
 *  @site    https://github.com/rmariuzzo/Lang.js
 *  @author  Rubens Mariuzzo <rubens@mariuzzo.com>
 */
(function(root,factory){"use strict";if(typeof define==="function"&&define.amd){define([],factory)}else if(typeof exports==="object"){module.exports=factory()}else{root.Lang=factory()}})(this,function(){"use strict";function inferLocale(){if(typeof document!=="undefined"&&document.documentElement){return document.documentElement.lang}}function convertNumber(str){if(str==="-Inf"){return-Infinity}else if(str==="+Inf"||str==="Inf"||str==="*"){return Infinity}return parseInt(str,10)}var intervalRegexp=/^({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])$/;var anyIntervalRegexp=/({\s*(\-?\d+(\.\d+)?[\s*,\s*\-?\d+(\.\d+)?]*)\s*})|([\[\]])\s*(-Inf|\*|\-?\d+(\.\d+)?)\s*,\s*(\+?Inf|\*|\-?\d+(\.\d+)?)\s*([\[\]])/;var defaults={locale:"en"};var Lang=function(options){options=options||{};this.locale=options.locale||inferLocale()||defaults.locale;this.fallback=options.fallback;this.messages=options.messages};Lang.prototype.setMessages=function(messages){this.messages=messages};Lang.prototype.getLocale=function(){return this.locale||this.fallback};Lang.prototype.setLocale=function(locale){this.locale=locale};Lang.prototype.getFallback=function(){return this.fallback};Lang.prototype.setFallback=function(fallback){this.fallback=fallback};Lang.prototype.has=function(key,locale){if(typeof key!=="string"||!this.messages){return false}return this._getMessage(key,locale)!==null};Lang.prototype.get=function(key,replacements,locale){if(!this.has(key,locale)){return key}var message=this._getMessage(key,locale);if(message===null){return key}if(replacements){message=this._applyReplacements(message,replacements)}return message};Lang.prototype.trans=function(key,replacements){return this.get(key,replacements)};Lang.prototype.choice=function(key,number,replacements,locale){replacements=typeof replacements!=="undefined"?replacements:{};replacements.count=number;var message=this.get(key,replacements,locale);if(message===null||message===undefined){return message}var messageParts=message.split("|");var explicitRules=[];for(var i=0;i<messageParts.length;i++){messageParts[i]=messageParts[i].trim();if(anyIntervalRegexp.test(messageParts[i])){var messageSpaceSplit=messageParts[i].split(/\s/);explicitRules.push(messageSpaceSplit.shift());messageParts[i]=messageSpaceSplit.join(" ")}}if(messageParts.length===1){return message}for(var j=0;j<explicitRules.length;j++){if(this._testInterval(number,explicitRules[j])){return messageParts[j]}}var pluralForm=this._getPluralForm(number);return messageParts[pluralForm]};Lang.prototype.transChoice=function(key,count,replacements){return this.choice(key,count,replacements)};Lang.prototype._parseKey=function(key,locale){if(typeof key!=="string"||typeof locale!=="string"){return null}var segments=key.split(".");var source=segments[0].replace(/\//g,".");return{source:locale+"."+source,sourceFallback:this.getFallback()+"."+source,entries:segments.slice(1)}};Lang.prototype._getMessage=function(key,locale){locale=locale||this.getLocale();key=this._parseKey(key,locale);if(this.messages[key.source]===undefined&&this.messages[key.sourceFallback]===undefined){return null}var message=this.messages[key.source];var entries=key.entries.slice();var subKey="";while(entries.length&&message!==undefined){var subKey=!subKey?entries.shift():subKey.concat(".",entries.shift());if(message[subKey]!==undefined){message=message[subKey];subKey=""}}if(typeof message!=="string"&&this.messages[key.sourceFallback]){message=this.messages[key.sourceFallback];entries=key.entries.slice();subKey="";while(entries.length&&message!==undefined){var subKey=!subKey?entries.shift():subKey.concat(".",entries.shift());if(message[subKey]){message=message[subKey];subKey=""}}}if(typeof message!=="string"){return null}return message};Lang.prototype._findMessageInTree=function(pathSegments,tree){while(pathSegments.length&&tree!==undefined){var dottedKey=pathSegments.join(".");if(tree[dottedKey]){tree=tree[dottedKey];break}tree=tree[pathSegments.shift()]}return tree};Lang.prototype._applyReplacements=function(message,replacements){for(var replace in replacements){message=message.replace(new RegExp(":"+replace,"gi"),function(match){var value=replacements[replace];var allCaps=match===match.toUpperCase();if(allCaps){return value.toUpperCase()}var firstCap=match===match.replace(/\w/i,function(letter){return letter.toUpperCase()});if(firstCap){return value.charAt(0).toUpperCase()+value.slice(1)}return value})}return message};Lang.prototype._testInterval=function(count,interval){if(typeof interval!=="string"){throw"Invalid interval: should be a string."}interval=interval.trim();var matches=interval.match(intervalRegexp);if(!matches){throw"Invalid interval: "+interval}if(matches[2]){var items=matches[2].split(",");for(var i=0;i<items.length;i++){if(parseInt(items[i],10)===count){return true}}}else{matches=matches.filter(function(match){return!!match});var leftDelimiter=matches[1];var leftNumber=convertNumber(matches[2]);if(leftNumber===Infinity){leftNumber=-Infinity}var rightNumber=convertNumber(matches[3]);var rightDelimiter=matches[4];return(leftDelimiter==="["?count>=leftNumber:count>leftNumber)&&(rightDelimiter==="]"?count<=rightNumber:count<rightNumber)}return false};Lang.prototype._getPluralForm=function(count){switch(this.locale){case"az":case"bo":case"dz":case"id":case"ja":case"jv":case"ka":case"km":case"kn":case"ko":case"ms":case"th":case"tr":case"vi":case"zh":return 0;case"af":case"bn":case"bg":case"ca":case"da":case"de":case"el":case"en":case"eo":case"es":case"et":case"eu":case"fa":case"fi":case"fo":case"fur":case"fy":case"gl":case"gu":case"ha":case"he":case"hu":case"is":case"it":case"ku":case"lb":case"ml":case"mn":case"mr":case"nah":case"nb":case"ne":case"nl":case"nn":case"no":case"om":case"or":case"pa":case"pap":case"ps":case"pt":case"so":case"sq":case"sv":case"sw":case"ta":case"te":case"tk":case"ur":case"zu":return count==1?0:1;case"am":case"bh":case"fil":case"fr":case"gun":case"hi":case"hy":case"ln":case"mg":case"nso":case"xbr":case"ti":case"wa":return count===0||count===1?0:1;case"be":case"bs":case"hr":case"ru":case"sr":case"uk":return count%10==1&&count%100!=11?0:count%10>=2&&count%10<=4&&(count%100<10||count%100>=20)?1:2;case"cs":case"sk":return count==1?0:count>=2&&count<=4?1:2;case"ga":return count==1?0:count==2?1:2;case"lt":return count%10==1&&count%100!=11?0:count%10>=2&&(count%100<10||count%100>=20)?1:2;case"sl":return count%100==1?0:count%100==2?1:count%100==3||count%100==4?2:3;case"mk":return count%10==1?0:1;case"mt":return count==1?0:count===0||count%100>1&&count%100<11?1:count%100>10&&count%100<20?2:3;case"lv":return count===0?0:count%10==1&&count%100!=11?1:2;case"pl":return count==1?0:count%10>=2&&count%10<=4&&(count%100<12||count%100>14)?1:2;case"cy":return count==1?0:count==2?1:count==8||count==11?2:3;case"ro":return count==1?0:count===0||count%100>0&&count%100<20?1:2;case"ar":return count===0?0:count==1?1:count==2?2:count%100>=3&&count%100<=10?3:count%100>=11&&count%100<=99?4:5;default:return 0}};return Lang});

(function () {
    Lang = new Lang();
    Lang.setMessages({"en.auth":{"failed":"These credentials do not match our records.","password":"The provided password is incorrect.","throttle":"Too many login attempts. Please try again in :seconds seconds."},"en.global":{"about-us":"About us","access":"Access?","accessLog":"Access logs","actions":"Actions","admin":"Admin","adopted":"Adopted!","all":"Total","animal-type":"Animal type","announce-status":"Announce status","announces":"Posts","bird":"Bird","cancel":"Cancel","cat":"Cat","community":"Community","confirm-notice":"You can't revert this process!","confirm-question":"Are you sure?","contact":"Contact","continue":"Continue","cp":"ZIP Code","create-error":"Problem ocurred while trying to create an announce!","create-success":"Created successfully!","createAnnounce":"Create announce","created_at":"Created","delete":"Delete","delete-error":"Problem ocurred while trying to deleting!","delete-success":"Deleted successfully!","deleteFilters":"Delete filters","description":"Description","dog":"Dog","dropify_default":"Drag and drop or click","dropify_error":"Oops, unexpected error","dropify_remove":"Remove","dropify_replace":"Drag and drop or click to replace","edit":"Edit","email":"Email","existing_user":"Existing user","failed":"Failed","female":"Female","forgot_password":"Forgot your password?","gender":"Gender","home":"Home","image1":"Image 1","image2":"Image 2","image3":"Image 3","image4":"Image 4","ip":"IP","localization":"Localization","login":"Log in","login_ifRegister":"log in if you are already registered","logout":"Logout","male":"Male","menu":"Menu","my-announces":"My posts","my-space":"My space","name":"Name","new":"New!","of":"of","on-hold":"On hold!","or":"Or","page":"Page","password":"Password","profile":"Profile","province":"Province","remember_me":"Remember me","restore":"Restore","restore-error":"Problem ocurred while trying to restore!","restore-success":"Restored successfully!","rodent":"Rodent","save":"Save","select":"Select one...","select-active":"Active","select-inactive":"Inactive","signin":"Sign in","signin_ifNotRegister":"sign in if you are not registered yet","status":"Status","success":"Success","surname":"Surname","title":"Title","tlfNumber":"Telephone number","unknown_user":"Unknown user","update-error":"Problem ocurred while trying to update!","update-success":"Updated successfully!","updated_at":"Updated","username":"Username","users":"Users"},"en.pagination":{"next":"Next &raquo;","previous":"&laquo; Previous"},"en.passwords":{"reset":"Your password has been reset!","sent":"We have emailed your password reset link!","throttled":"Please wait before retrying.","token":"This password reset token is invalid.","user":"We can't find a user with that email address."},"en.validation":{"accepted":"The :attribute must be accepted.","active_url":"The :attribute is not a valid URL.","after":"The :attribute must be a date after :date.","after_or_equal":"The :attribute must be a date after or equal to :date.","alpha":"The :attribute must only contain letters.","alpha_dash":"The :attribute must only contain letters, numbers, dashes and underscores.","alpha_num":"The :attribute must only contain letters and numbers.","array":"The :attribute must be an array.","attributes":[],"before":"The :attribute must be a date before :date.","before_or_equal":"The :attribute must be a date before or equal to :date.","between":{"array":"The :attribute must have between :min and :max items.","file":"The :attribute must be between :min and :max kilobytes.","numeric":"The :attribute must be between :min and :max.","string":"The :attribute must be between :min and :max characters."},"boolean":"The :attribute field must be true or false.","confirmed":"The :attribute confirmation does not match.","custom":{"attribute-name":{"rule-name":"custom-message"}},"date":"The :attribute is not a valid date.","date_equals":"The :attribute must be a date equal to :date.","date_format":"The :attribute does not match the format :format.","different":"The :attribute and :other must be different.","digits":"The :attribute must be :digits digits.","digits_between":"The :attribute must be between :min and :max digits.","dimensions":"The :attribute has invalid image dimensions.","distinct":"The :attribute field has a duplicate value.","email":"The :attribute must be a valid email address.","ends_with":"The :attribute must end with one of the following: :values.","exists":"The selected :attribute is invalid.","file":"The :attribute must be a file.","filled":"The :attribute field must have a value.","gt":{"array":"The :attribute must have more than :value items.","file":"The :attribute must be greater than :value kilobytes.","numeric":"The :attribute must be greater than :value.","string":"The :attribute must be greater than :value characters."},"gte":{"array":"The :attribute must have :value items or more.","file":"The :attribute must be greater than or equal :value kilobytes.","numeric":"The :attribute must be greater than or equal :value.","string":"The :attribute must be greater than or equal :value characters."},"image":"The :attribute must be an image.","in":"The selected :attribute is invalid.","in_array":"The :attribute field does not exist in :other.","integer":"The :attribute must be an integer.","ip":"The :attribute must be a valid IP address.","ipv4":"The :attribute must be a valid IPv4 address.","ipv6":"The :attribute must be a valid IPv6 address.","json":"The :attribute must be a valid JSON string.","lt":{"array":"The :attribute must have less than :value items.","file":"The :attribute must be less than :value kilobytes.","numeric":"The :attribute must be less than :value.","string":"The :attribute must be less than :value characters."},"lte":{"array":"The :attribute must not have more than :value items.","file":"The :attribute must be less than or equal :value kilobytes.","numeric":"The :attribute must be less than or equal :value.","string":"The :attribute must be less than or equal :value characters."},"max":{"array":"The :attribute must not have more than :max items.","file":"The :attribute must not be greater than :max kilobytes.","numeric":"The :attribute must not be greater than :max.","string":"The :attribute must not be greater than :max characters."},"mimes":"The :attribute must be a file of type: :values.","mimetypes":"The :attribute must be a file of type: :values.","min":{"array":"The :attribute must have at least :min items.","file":"The :attribute must be at least :min kilobytes.","numeric":"The :attribute must be at least :min.","string":"The :attribute must be at least :min characters."},"multiple_of":"The :attribute must be a multiple of :value.","not_in":"The selected :attribute is invalid.","not_regex":"The :attribute format is invalid.","numeric":"The :attribute must be a number.","password":"The password is incorrect.","present":"The :attribute field must be present.","prohibited":"The :attribute field is prohibited.","prohibited_if":"The :attribute field is prohibited when :other is :value.","prohibited_unless":"The :attribute field is prohibited unless :other is in :values.","regex":"The :attribute format is invalid.","required":"The :attribute field is required.","required_if":"The :attribute field is required when :other is :value.","required_unless":"The :attribute field is required unless :other is in :values.","required_with":"The :attribute field is required when :values is present.","required_with_all":"The :attribute field is required when :values are present.","required_without":"The :attribute field is required when :values is not present.","required_without_all":"The :attribute field is required when none of :values are present.","same":"The :attribute and :other must match.","size":{"array":"The :attribute must contain :size items.","file":"The :attribute must be :size kilobytes.","numeric":"The :attribute must be :size.","string":"The :attribute must be :size characters."},"starts_with":"The :attribute must start with one of the following: :values.","string":"The :attribute must be a string.","timezone":"The :attribute must be a valid zone.","unique":"The :attribute has already been taken.","uploaded":"The :attribute failed to upload.","url":"The :attribute format is invalid.","uuid":"The :attribute must be a valid UUID."},"es.auth":{"failed":"Estas credenciales no coinciden con nuestros registros.","password":"La contrase\u00f1a proporcionada es incorrecta. ","throttle":"Demasiados intentos de inicio de sesi\u00f3n. Vuelva a intentarlo en: segundos segundos. "},"es.global":{"about-us":"Nosotros","access":"\u00bfAcceso?","accessLog":"Logs de acceso","actions":"Acciones","admin":"Admin","adopted":"Adoptado!","all":"Total","animal-type":"Tipo de animal","announce-status":"Estado del anuncio","announces":"Anuncios","bird":"Pajaro","cancel":"Cancelar","cat":"Gato","community":"Comunidad","confirm-notice":"No podr\u00e1s revertir este proceso","confirm-question":"\u00bfEst\u00e1s seguro?","contact":"Contacto","continue":"Continuar","cp":"C\u00f3digo postal","create-error":"Ha ocurrido un problema al crear el anuncio!","create-success":"Creado correctamente!","createAnnounce":"Crear anuncio","created_at":"Creado","delete":"Eliminar","delete-error":"Ha ocurrido un problema al eliminar","delete-success":"Borrado correctamente!","deleteFilters":"Borrar filtros","description":"Descripci\u00f3n","dog":"Perro","dropify_default":"Arrastre y suelte o haga click","dropify_error":"Oops, algo no ocurri\u00f3 como esperabamos","dropify_remove":"Borrar","dropify_replace":"Arrastre y suelte o haga click para reemplazar","edit":"Editar","email":"Email","existing_user":"Usuario existente","failed":"Fallido","female":"Hembra","forgot_password":"\u00bfTe has olvidado de t\u00fa contrase\u00f1a?","gender":"G\u00e9nero","home":"Inicio","image1":"Imagen 1","image2":"Imagen 2","image3":"Imagen 3","image4":"Imagen 4","ip":"IP","localization":"Ubicaci\u00f3n","login":"Logueate","login_ifRegister":"logueate si ya est\u00e1s registrado","logout":"Desconectarse","male":"Macho","menu":"Men\u00fa","my-announces":"Mis anuncios","my-space":"Mi espacio","name":"Nombre","new":"Nuevo!","of":"de","on-hold":"Es espera!","or":"O","page":"P\u00e1gina","password":"Contrase\u00f1a","profile":"Perfil","province":"Provincia","remember_me":"Recu\u00e9rdame","restore":"Restaurar","restore-error":"Ha ocurrido un problema al restaurar","restore-success":"Restaurado correctamente!","rodent":"Roedor","save":"Guardar","select":"Selecciona uno...","select-active":"Activo","select-inactive":"Inactivo","signin":"Registrate","signin_ifNotRegister":"registrate si todav\u00eda no lo est\u00e1s","status":"Estado","success":"Correcto","surname":"Apellidos","title":"T\u00edtulo","tlfNumber":"N\u00ba tel\u00e9fono","unknown_user":"Usuario desconocido","update-error":"Ha ocurrido un problema al actualizar","update-success":"Actualizado correctamente!","updated_at":"Actualizado","username":"Usuario","users":"Usuarios"},"es.validation":{"accepted":"El campo :attribute debe ser aceptado.","active_url":"El campo :attribute no es una URL v\u00e1lida.","after":"El campo :attribute debe ser una fecha posterior a :date.","after_or_equal":"El campo :attribute debe ser una fecha posterior o igual a :date.","alpha":"El campo :attribute solo puede contener letras.","alpha_dash":"El campo :attribute solo puede contener letras, n\u00fameros, guiones y guiones bajos.","alpha_num":"El campo :attribute solo puede contener letras y n\u00fameros.","array":"El campo :attribute debe ser un array.","before":"El campo :attribute debe ser una fecha anterior a :date.","before_or_equal":"El campo :attribute debe ser una fecha anterior o igual a :date.","between":{"array":"El campo :attribute debe contener entre :min y :max elementos.","file":"El archivo :attribute debe pesar entre :min y :max kilobytes.","numeric":"El campo :attribute debe ser un valor entre :min y :max.","string":"El campo :attribute debe contener entre :min y :max caracteres."},"boolean":"El campo :attribute debe ser verdadero o falso.","confirmed":"El campo confirmaci\u00f3n de :attribute no coincide.","custom":{"attribute-name":{"rule-name":"custom-message"}},"date":"El campo :attribute no corresponde con una fecha v\u00e1lida.","date_equals":"El campo :attribute debe ser una fecha igual a :date.","date_format":"El campo :attribute no corresponde con el formato de fecha :format.","different":"Los campos :attribute y :other deben ser diferentes.","digits":"El campo :attribute debe ser un n\u00famero de :digits d\u00edgitos.","digits_between":"El campo :attribute debe contener entre :min y :max d\u00edgitos.","dimensions":"El campo :attribute tiene dimensiones de imagen inv\u00e1lidas.","distinct":"El campo :attribute tiene un valor duplicado.","email":"El campo :attribute debe ser una direcci\u00f3n de correo v\u00e1lida.","ends_with":"El campo :attribute debe finalizar con alguno de los siguientes valores: :values","exists":"El campo :attribute seleccionado no existe.","file":"El campo :attribute debe ser un archivo.","filled":"El campo :attribute debe tener un valor.","gt":{"array":"El campo :attribute debe contener m\u00e1s de :value elementos.","file":"El archivo :attribute debe pesar m\u00e1s de :value kilobytes.","numeric":"El campo :attribute debe ser mayor a :value.","string":"El campo :attribute debe contener m\u00e1s de :value caracteres."},"gte":{"array":"El campo :attribute debe contener :value o m\u00e1s elementos.","file":"El archivo :attribute debe pesar :value o m\u00e1s kilobytes.","numeric":"El campo :attribute debe ser mayor o igual a :value.","string":"El campo :attribute debe contener :value o m\u00e1s caracteres."},"image":"El campo :attribute debe ser una imagen.","in":"El campo :attribute es inv\u00e1lido.","in_array":"El campo :attribute no existe en :other.","integer":"El campo :attribute debe ser un n\u00famero entero.","ip":"El campo :attribute debe ser una direcci\u00f3n IP v\u00e1lida.","ipv4":"El campo :attribute debe ser una direcci\u00f3n IPv4 v\u00e1lida.","ipv6":"El campo :attribute debe ser una direcci\u00f3n IPv6 v\u00e1lida.","json":"El campo :attribute debe ser una cadena de texto JSON v\u00e1lida.","lt":{"array":"El campo :attribute debe contener menos de :value elementos.","file":"El archivo :attribute debe pesar menos de :value kilobytes.","numeric":"El campo :attribute debe ser menor a :value.","string":"El campo :attribute debe contener menos de :value caracteres."},"lte":{"array":"El campo :attribute debe contener :value o menos elementos.","file":"El archivo :attribute debe pesar :value o menos kilobytes.","numeric":"El campo :attribute debe ser menor o igual a :value.","string":"El campo :attribute debe contener :value o menos caracteres."},"max":{"array":"El campo :attribute no debe contener m\u00e1s de :max elementos.","file":"El archivo :attribute no debe pesar m\u00e1s de :max kilobytes.","numeric":"El campo :attribute no debe ser mayor a :max.","string":"El campo :attribute no debe contener m\u00e1s de :max caracteres."},"mimes":"El campo :attribute debe ser un archivo de tipo: :values.","mimetypes":"El campo :attribute debe ser un archivo de tipo: :values.","min":{"array":"El campo :attribute debe contener al menos :min elementos.","file":"El archivo :attribute debe pesar al menos :min kilobytes.","numeric":"El campo :attribute debe ser al menos :min.","string":"El campo :attribute debe contener al menos :min caracteres."},"not_in":"El campo :attribute seleccionado es inv\u00e1lido.","not_regex":"El formato del campo :attribute es inv\u00e1lido.","numeric":"El campo :attribute debe ser un n\u00famero.","password":"La contrase\u00f1a es incorrecta.","present":"El campo :attribute debe estar presente.","pwcheck":"La contrase\u00f1a debe ser como m\u00ednimo de :numcharacter caracteres, debe contener una may\u00fascula y al menos un n\u00famero.","regex":"El formato del campo :attribute es inv\u00e1lido.","required":"El campo :attribute es obligatorio.","required_if":"El campo :attribute es obligatorio cuando el campo :other es :value.","required_unless":"El campo :attribute es requerido a menos que :other se encuentre en :values.","required_with":"El campo :attribute es obligatorio cuando :values est\u00e1 presente.","required_with_all":"El campo :attribute es obligatorio cuando :values est\u00e1n presentes.","required_without":"El campo :attribute es obligatorio cuando :values no est\u00e1 presente.","required_without_all":"El campo :attribute es obligatorio cuando ninguno de los campos :values est\u00e1n presentes.","same":"Los campos :attribute y :other deben coincidir.","size":{"array":"El campo :attribute debe contener :size elementos.","file":"El archivo :attribute debe pesar :size kilobytes.","numeric":"El campo :attribute debe ser :size.","string":"El campo :attribute debe contener :size caracteres."},"starts_with":"El campo :attribute debe comenzar con uno de los siguientes valores: :values","string":"El campo :attribute debe ser una cadena de caracteres.","timezone":"El campo :attribute debe ser una zona horaria v\u00e1lida.","unique":"El valor del campo :attribute ya est\u00e1 en uso.","uploaded":"El campo :attribute no se pudo subir.","url":"El formato del campo :attribute es inv\u00e1lido.","uuid":"El campo :attribute debe ser un UUID v\u00e1lido."}});
})();
