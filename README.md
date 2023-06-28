# 📺 ABC Drama Page (가상 드라마 페이지) 🖥️

***
## 0. 소개
#### (1) 사용 언어
* PHP, HTML, CSS, Javascript
#### (2) 작업 시기
* 대학교 2학년 2학기 기말 개인 프로젝트
* 20221 하반기 / 약 2주 소요
* [서버 프로그래밍] 과목
#### (3) 특징
* 주제: 드라마 홈페이지 (이때 드라마는 내가 설정한 가상의 드라마)
  * 가상 드라마 컨셉
    *  방송사: ABC
    *  이름: Drama
    *  방영기간: 2021.12.22. ~ 2022.12.22.
    *  편성: 5부작
      
![img1](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/05e52288-2850-4846-b459-c00ab339f1c1)
* DB
  * 데이터베이스명: dramaproject
  * 테이블 3개로 구성
    * board: 게시판
    * members: 회원 정보
    * message: 쪽지

![img2](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/c16b4d14-673d-40cc-9a13-9f7bcb649d99)

  * SQL문
    * member.sql 
      * ```sql
        create table members (
	        num int not null auto_increment,
	        id char(15) not null,
	        pw char(15) not null,
	        nick char(10) not null,
	        name char(10),
	        email char(50),
	        registDay char(30),
	        level char(10),
	        point int,
	        primary key(num)
        );
        ```
      *  각 컬럼의 의미
         * num: 회원 수
         * id: 아이디
         * pw: 패스워드
         * nick: 닉네임
         * name: 이름
         * email: 이메일
         * registDay: 가입일자  
         * level: 회원레벨
           * 새싹, 잎새, 열매, 나무, 관리자
           * 레벨별로 기능 이용에 제한이 있음
         * point: 포인트
           * 게시글 작성하면 1000포인트씩 올려줌
           * 일정 포인트 이상이면 관리자가 레벨 올려줌

    * board.sql 
      * ```sql
        create table board (
	        num int not null auto_increment,
	        id char(15) not null,
	        nick char(20) not null,
	        subject char(100) not null,
	        content text not null,
	        registDay char(30),
	        hit int not null,
	        level char(10),
	        point int,
	        primary key(num)
        );
        ```
      *  각 컬럼의 의미
         * num: 게시글 수
         * id: 아이디
         * nick: 닉네임
         * subject: 게시글 제목
         * content: 게시글 내용
         * registDay: 게시글 등록일자
         * hit: 조회수
         * point: 포인트
           * 게시글 작성 시, 1000 포인트 추가
         * level: 회원레벨
           * 새싹레벨
              * 가장 낮은 단계(가입 직후)
              * 게시판 글쓰기O
              * 게시판 상세보기, 쪽지 주고받기, [다시보기] 메뉴 이용X
           * 잎새레벨
              * 게시글 1개 작성하면, 잎새 레벨
              * 게시판 글쓰기, 게시판 상세보기O
              * 쪽지 주고받기, [다시보기] 메뉴 이용X
           * 열매레벨
              * 게시글 3개 작성하면, 열매 레벨
              * 게시판 글쓰기, 게시판 상세보기, 쪽지 주고받기O
              * [다시보기] 메뉴 이용X
           * 나무레벨
              * 게시글 5개 작성하면, 나무 레벨
              * 게시판 글쓰기, 게시판 상세보기, 쪽지 주고받기, [다시보기] 메뉴 이용O
***
