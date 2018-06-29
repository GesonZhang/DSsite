/**
 * Created by apple on 17/6/22.
 */

//引入相关文件
import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

//定义初始化变量
const state = {
  account:'',
  password:'',
  phone:'',
  info:[],
  teacherList:[],
  get_beans:true,
  date:'',
  classList:[],
  catalog:'',
  sentlength0:0,
  sentlength1:0,
  sentlength2:0,
  identify:'',
}

//定义动作 事件处理方法 类似于计算属性
const mutations = {
  reg_info(state,status){
    state.account = status;
  },
  info(state,status){
    state.info = status;
  },
  get_beans(state,status){
    state.get_beans = status[0];
    state.date = status[1];
  },
  teacherList(state,status){
    state.teacherList = status;
  },
  classList(state,status){
    state.classList = status;
  },
  catalogs(state,status){
    state.catalog=status;
  },
  sentlength0(state,status){
    state.sentlength0=status;
  },
  sentlength1(state,status){
    state.sentlength1=status;
  },
  sentlength2(state,status){
    state.sentlength2=status;
  },
  identify(state,status){
    state.identify=status;
  },
}

//对外的事件方法
const actions = {
  reg_info:({commit},status)=>commit('reg_info',status),
  info:({commit},status)=>commit('info',status),
  get_beans:({commit},status)=>commit('get_beans',status),
  teacherList:({commit},status)=>commit('teacherList',status),
  catalogs:({commit},status)=>commit('catalogs',status),
  classList:({commit},status)=>commit('classList',status),
  sentlength0:({commit},status)=>commit('sentlength0',status),
  sentlength1:({commit},status)=>commit('sentlength1',status),
  sentlength2:({commit},status)=>commit('sentlength2',status),
  identify:({commit},status)=>commit('identify',status)
}

const getters = {

}

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters
})
