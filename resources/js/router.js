import { createRouter, createWebHistory } from 'vue-router'

// コンポーネントをインポート
import IndexComponent from './components/IndexComponent.vue';

const router = createRouter({
history: createWebHistory(),
routes: [
    {
        // routeのパス設定
        path: '/entry/index',
        // 名前付きルートを設定したい場合付与
        name: 'index',
        // コンポーネントの指定
        component: IndexComponent
    },
]
});

export default router;