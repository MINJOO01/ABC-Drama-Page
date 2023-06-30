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


***
## 1. 데이터베이스 
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

    * message.sql 
      * ```sql
		create table message (
			num int not null auto_increment,
			send_id char(20) not null,
			rv_id char(20) not null,
			subject char(200) not null,
			content text not null,
			registDay char(20),
			primary key(num)
		);
        ```
      *  각 컬럼의 의미
         * num: 쪽지 개수
         * send_id: 보낸 사람
         * rv_id: 받은 사람
         * subject: 쪽지 제목
         * content: 쪽지 내용
         * registDay: 쪽지 보내거나/받은 날짜
           
***
## 1. 기능
#### (1) 메뉴 바의 메뉴는 5개로 구성됨
* [HOME], [프로그램 정보], [클립 영상], [다시보기], [시청자 게시판]
* [HOME] : index 페이지(home 화면)과 연결
* [프로그램 정보] : intro 페이지(프로그램 정보 소개)와 연결
* [클립 영상]: video1 페이지(클립 영상 나열)과 연결
* [다시보기]: video2 페이지(풀 영상 나열)과 연결
* [시청자 게시판]: board 페이지(시청자 게시판)과 연결

![img3](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/1c55d2fb-b775-4ae7-9e58-61d70b314275)


![img4](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/d75c1e74-0f95-45a3-b5f4-e4f2ff5cf766)


#### (2) index 페이지의 구성

![img5](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/42670c25-476a-4b48-bf59-6fe26a98006d)

#### (3) 로그인 기능

![img6](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/e77df9ac-b0b5-4548-8913-f3fe4d3863dc)

![img7](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/4a57a68d-bef1-4e0c-9ef4-effc3f38c64a)

![img8](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/296515e9-b8f9-447b-b567-69a6d889d8f7)

![img9](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/d732b709-c119-4254-b8af-94187f92a835)

![img10](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/b1f94908-8c94-4488-b289-8bfc85123329)

![img11](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/10cdc04f-9af0-4468-97ef-cdd348c5c4cb)

![img12](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/9f370914-3961-4c77-944e-4285255f1004)

![img13](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/5edbfce6-1da8-4388-8dbd-31ce0d57b387)

#### (4) 쪽지 기능
* 열매 레벨 이상 사용 가능

![img14](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/798dd841-5c11-4db0-98ab-a77269526999)

![img15](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/c3574ae8-ffd0-43d1-9713-d1314b947edd)

![img16](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/d04f4636-c5d1-4124-8feb-c99713c3d7a1)

#### (4) 프로그램 정보 메뉴

![img17](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/f54c7d89-ce74-4263-9307-dc0ca14af503)

![img18](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/057042e8-3568-4c90-8ec3-1a48a948155e)

![img19](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/831f35db-349a-48bb-b45f-53c6c37a1a95)


#### (5) 클립 영상 메뉴

![img20](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/1c240696-5ae4-4237-b03c-09aa559d5cae)

![img21](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/419d2a91-cda5-451a-a2aa-388bae17c1e7)

![img22](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/0f85483d-758d-4393-bbdb-aed611063175)

![img23](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/dac2eb0c-ea71-4292-b1bb-2942da9ac090)

![img24](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/cc91c856-bfa3-472d-8dc2-7b0a5100792b)

#### (6) 다시보기 메뉴

![img25](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/fd5866e3-36b4-4d8e-96cc-99ca98b8dc10)

![img26](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/b5c2eb51-9763-413b-b77c-8621c7a096e8)

![img27](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/3e073619-eb47-46a9-8829-c570f19d985a)

![img28](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/49cf4892-e158-4db6-a05f-140e9196de62)

![img29](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/1a6f7110-44e5-4946-9675-b0a019517a25)

#### (7) 시청자 게시판 메뉴

![img30](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/5f3fbbdf-d147-48ef-b99c-47ffd49048d0)

![img31](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/b767f500-255a-4b65-86dc-e1ae0c4805b5)

#### (8) 관리자 모드

![img33](https://github.com/MINJOO01/ABC-Drama-Page/assets/77265017/a0497519-61c9-4eba-804e-b8902269bf3c)

***
