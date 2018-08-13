/**
 * Created by Administrator on 2017/9/26.
 */


/**
 * 查看对象中的内容
 * @param obj
 */
function d(obj){
    console.dir(obj);
}


/**
 * debug打印传入数据
 */
function p() {
    for(var i in arguments){
        console.debug(arguments[i]);
    }
}

/**
 * document.getElementById
 * @param id
 * @returns {Element}
 */
function $(id){
    return document.getElementById(id);
}