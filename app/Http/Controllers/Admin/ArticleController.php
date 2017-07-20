<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * 显示文章列表
     */
    public function index(){
        return view('article/index')->with('articles', Article::all());
    }

    /**
     * 创建新文章表单页面
     */
    public function create(){
        return view('article/create');
    }

    /**
     * 将新建的文章存储到存储器
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request){
        /**
         * validator 验证 第一个参数表单传过来的值，第二个参数对应的表单验证的条件，第三个参数验证条件的说明，第四个参数对于表单传过来的key说明
         */
//        $validator = \Validator::make($request->input(), [
//            'title' =>  'required|min:2|max:50',
//            'desc'  =>  'required|min:10|max:255',
//        ], [
//            'required'  =>  ':attribute 为必填项',
//            'min'       =>  ':attribute 长度不符合要求',
//            'max'       =>  ':attribute 长度不符合要求',
//        ], [
//            'title' =>  '标题',
//            'desc'  =>  '简介'
//        ]);
//        //判断是否通过验证
//        if($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }
        $article = new Article();
        $article->title = $request->input('title');
        $article->desc = $request->input('desc');
        if($article->save()){
            return redirect('admin/article')->with('success', '添加成功');
        }else{
            return redirect()->with('error', '添加失败')->back();
        }
    }

    /**
     * 显示指定的文章
     *
     * @param $id
     * @return Response
     */
    public function show($id){
        $article = Article::find($id);
        return view('article.show', ['article' => $article]);
    }

    /**
     * 显示编辑指定文章的表单页面
     *
     * @param $id
     * @return Response
     */
    public function edit($id){
        $article = Article::find($id);
        return view('article/edit')->with('article', $article);
    }

    /**
     * 在存储器中更新指定的文章
     *
     * @param ArticleRequest $request
     * @param $id
     * @return Response
     *
     */
    public function update(ArticleRequest $request, $id){
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->desc = $request->input('desc');
        if($article->save()){
            return redirect('admin/article')->with('success', '修改成功');
        }else{
            return redirect()->with('error', '修改失败')->back();
        }
    }

    /**
     * 从存储器中移除指定的文章
     *
     * @param $id
     * @return Response
     */
    public function destroy($id){
        $article = Article::find($id);
        if($article->delete()){
           return redirect('admin/article')->with('success', '删除成功');
        }else{
           return redirect('admin/article')->with('error', '删除失败');
        }
    }

}
