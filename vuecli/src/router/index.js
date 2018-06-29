import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'

import TeacherList from '@/components/teacher/TeacherList'
import Recommend from'@/components/teacher/Recommend'
import Discounts from'@/components/teacher/Discounts'
import Remind from'@/components/teacher/Remind'
import Message from'@/components/teacher/Message'
import Banner from'@/components/teacher/banner'

import Course from'@/components/course/Course'
import Class from'@/components/course/Class'
import Finish from'@/components/course/Finish'
import Waiting from'@/components/course/Waiting'

import Education from '@/components/education/Teacher'
import TeacherMsg from '@/components/education/teacherMsg'
import Filter from'@/components/education/filter'
import TeacherMsgReal from '@/components/education/TeacherMsgReal'
import TeacherCLass from '@/components/education/teacherClass'
import TeacherEva from '@/components/education/teacherEva'
import JoinClass from '@/components/education/joinClass'

import Login from '@/components/logReg/Login'
import Reg from '@/components/logReg/Reg'
import DoReg from '@/components/logReg/DoReg'
import Phone_message from'@/components/logReg/Phone_message'
import Forgetpass from'@/components/logReg/Forgetpass'

import More from '@/components/more/More'
import Attention from '@/components/more/Attention'
import MyInfo from '@/components/more/MyInfo'
import Set from '@/components/more/Set'
import AboutUs from '@/components/more/about/AboutUs'
import AboutServer from '@/components/more/about/AboutServer'
import AboutHelp from '@/components/more/about/AboutHelp'
import HelpFlow from '@/components/more/about/HelpFlow'
import HelpClass from '@/components/more/about/HelpClass'
import HelpPay from '@/components/more/about/HelpPay'
import HelpRefund from '@/components/more/about/HelpRefund'
import HelpOrder from '@/components/more/about/HelpOrder'
import HelpTable from '@/components/more/about/HelpTable'
import HelpEva from '@/components/more/about/HelpEva'
import HelpAbout from '@/components/more/about/HelpAbout'
import AboutContact from '@/components/more/about/AboutContact'
import HeadChange from '@/components/more/change/HeadChange'
import NameChange from '@/components/more/change/NameChange'
import SexChange from '@/components/more/change/SexChange'
import PhoneChange from '@/components/more/change/PhoneChange'
import AddressChange from '@/components/more/change/AddressChange'
import DoWell from '@/components/more/change/DowellChange'
import Major from '@/components/more/change/MajorChange'
import Years from '@/components/more/change/YearsChange'
import Signature from '@/components/more/change/SignatureChange'
import Skin from '@/components/more/change/SkinChange'
import Accountmanage from '@/components/more/Management'
import Feedback from '@/components/more/Feedback'
import ChangePassword from '@/components/more/ChangePassword'


import AddClass from '@/components/more/addClass'
import AddClass_check from '@/components/more/addClass_check'
import Reg_check from '@/components/more/reg_check'
import AddHonor from '@/components/more/addHonor'
import DelClass from '@/components/more/delClass'
import DelClassing from '@/components/more/delClassing'

Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '/',
      redirect: '/index'
    },
    {
      path:'/index',
      component:Banner
    },
    {
      path: '/indexreal',
      component: Index
    },


    {
      path: '/teacherlist/:id',
      component: TeacherList
    },
    {
      path:'/teacher-msg/:id',
      redirect:'/teacher-msg/real/:id'
    },
    {
      path:'/teacher-msg/:id',
      component:TeacherMsg,
        children:[
            {path:'/teacher-msg/real/:id',component:TeacherMsgReal},
            {path:'/teacher-msg/class/:id',component:TeacherCLass},
            {path:'/teacher-msg/eva/:id',component:TeacherEva}
        ]
    },
    {
      path: '/join-class/:id',
      component: JoinClass
    },

    {
      path:'/message',
      redirect:'/message/remind'
    },
    {
      path:'/message',
      component:Message,
      children:[
        { path: "/message/remind", component: Remind },
        { path: "/message/recommend", component: Recommend },
        { path: "/message/discounts", component: Discounts }
      ]
    },

    {
      path:'/course',
      redirect:'/course/class'
    },
    {
      path:'/course',
      component:Course,
      children:[
        { path: "/course/class", component: Class },
        { path: "/course/waiting", component: Waiting },
        { path: "/course/finish", component: Finish }
      ]
    },

    {
      path:'/education',
      component:Education
    },

    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/reg',
      name: 'reg',
      component: Reg
    },
    {
      path: '/do_reg',
      component: DoReg
    },
    {
      path: '/phone_message',
      name: 'phone_message',
      component: Phone_message
    },
    {
      path: '/forgetpass',
      name: 'forgetpass',
      component: Forgetpass
    },

    {
      path: '/more',
      component: More
    },
    {
      path: '/more/attention',
      component: Attention
    },
     {
      path: '/more/addclass',
      component: AddClass
    },
      {
          path: '/more/addclass_check',
          component: AddClass_check
      },
      {
          path: '/more/reg_check',
          component: Reg_check
      },
     {
      path: '/more/delclass',
      component: DelClass
    },
     {
      path: '/more/delclassing',
      component: DelClassing
    },
    {
      path: '/more/addhonor',
      component: AddHonor
    },
    {
      path: '/more/my_info',
      component: MyInfo
    },
    {
      path: '/more/set',
      component: Set
    },
    {
      path: '/aboutus',
      component: AboutUs
    },
    {
      path: '/more/about/aboutserver',
      component: AboutServer
    },
    {
      path: '/more/about/abouthelp',
      component: AboutHelp
    },
    {
      path: '/more/about/helpflow',
      component: HelpFlow
    },
    {
      path: '/more/about/helpclass',
      component: HelpClass
    },
    {
      path: '/more/about/helppay',
      component: HelpPay
    },
    {
      path: '/more/about/helprefund',
      component: HelpRefund
    },
    {
      path: '/more/about/helporder',
      component: HelpOrder
    },
    {
      path: '/more/about/helptable',
      component: HelpTable
    },
    {
      path: '/more/about/helpeva',
      component: HelpEva
    },
    {
      path: '/more/about/helpabout',
      component: HelpAbout
    },
    {
      path: '/more/about/aboutcontact',
      component: AboutContact
    },
    {
      path: '/more/change/headchange',
      component: HeadChange
    },
    {
      path: '/more/change/namechange',
      component: NameChange
    },
    {
      path: '/more/change/sexchange',
      component: SexChange
    },
    {
      path: '/more/change/phonechange',
      component: PhoneChange
    },
    {
      path: '/more/change/addresschange',
      component: AddressChange
    },
    {
      path: '/more/change/signature',
      component: Signature
    },
      {
          path: '/more/change/dowell',
          component: DoWell
      },
      {
          path: '/more/change/major',
          component: Major
      },
      {
          path: '/more/change/years',
          component: Years
      },
    {
      path: '/more/change/Skin',
      component: Skin
    },

    {
      path: '/more/accountmanage',
      component: Accountmanage
    },
    {
      path: '/more/change/skin',
      component: Skin
    },
    {
      path: '/more/feedback',
      component: Feedback
    },
    {
      path: '/more/changepassword',
      component: ChangePassword
    },


  ],mode:'history'
})
