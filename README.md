### **💡 About Application**

---


> The web-based Rukun Warga Administration application is an application to learn more about the activities, benefits,
> and purposes as well as the importance of administation at RW. This application is made using Laravel version 10 and
> at
> least PHP ^8.1 so if at the time of installation or use there are errors or bugs likely due to versions of PHP that
> are
> not supported.

### **Tech Stack:**

---

- **[Backend Laravel _10.3.*_](https://laravel.com/docs/10.x/releases#laravel-10)**
- **[Frontend TailwindCSS](https://tailwindcss.com/docs/installation)**
- **[Database Mysql _8.0._](https://dev.mysql.com/doc/refman/8.0/en/)**

### **Software Requirement:**

---

- **[Git](https://git-scm.com/downloads)**
- **[Github](https://github.com)**
- **[Composer _2.6.6_](https://getcomposer.org/download/)**
- **[NodeJS _20_](https://nodejs.org/en/download/current)**
- **[PHP _8.1_](https://www.php.net/downloads.php)
  or [Laragon with bundling php 8.1](https://laragon.org/download/index.html)**
- **[Postman](https://www.postman.com/downloads/) or [Thunderclient(VScode Extension)](https://www.thunderclient.com/)**

### **🙇 Team:**

---

- Dyinastie Marchelina Puspitawening
- Emir Abiyyu Delanggra
- Muhammad Rifky Harto Biantoro
- Syahrul Bhudi Ferdiansyah

### **🕙 Installation:**

---

1. Open Address repository:

   [Repository](https://github.com/SyahrulBhudiF/Siwarga13)

2. Fork repository:

    - Search Fork in right corner of repo and click
    - Click Create Fork in bottom, make sure you uncheck the Copy the master branch only
    - If in your repository had fork from above repository address, your fork process is success

3. Clone fork repository:

    ```bash
    git clone https://github.com/Your_Github_Address/Siwarga13
    ```

   note: change "Your_Github_Address" with your actual address, like: SyahrulBhudiF or Rifki4w

4. Enter path folder repository:

    ```bash
    cd Siwarga13
    ```

5. Install dependency:

    ```bash
    composer install
    composer update
    npm install
    ```

6. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

7. Generate key:

    ```bash
    php artisan key:generate
    ```

8. Create new Database `db_pbl` (match the database name in the file `.env`) in phpmyadmin or terminal:

    ```bash
    mysql -u root -p
    create database db_pbl;
    exit;
    ```

9. Migrate database:

    ```bash
    php artisan migrate
    ```

10. Seeding database:

     ```bash
     php artisan db:seed
     ```

11. run server:

    a. Laravel Server:
     ```bash
     php artisan serve
     ```
    b. Laragon Server:
    Click Start in Laragon UI

12. Open browser and Access Localhost `http://localhost:8000` (for Laravel Server)
    or `http://localhost/www/Laravel_PBL` (for Laragon Server)

#### note: for steps 2-11 or any of steps that using bash or command syntax, you can do those bash syntax in your terminal or IDE-integrated terminal ####

### **🕙 Project Collaboration:**

---

1. Sync Your Fork repository:
   You can click in middle top right in Your GitHub repository: Laravel_PBL

2. check your git status, specifically in branch:

   ```bash
   git status
   ``` 

   if branch isn't relate to your role, Change Branch to the related Your Role:
   ```bash
   git checkout frontend
   ```
   or
    ```bash
   git checkout backend
   ```
   or
    ```bash
   git checkout Your_Role
   ```

3. Pull code change, after fork synced in steps 1:

   ```bash
   git pull
   ```

4. Crate your code change

5. Add to staging index your change:

   ```bash
   git add .
   ```

6. Commit change:

   ```bash
   git commit -m "commit message"
   ```

   Note: for conventional commit message you can follow this rule:
   #### Conventional Commit Messages
   See how a [minor change](#examples) to your commit message style can make a difference.

   **ℹ️ [git-conventional-commits](https://github.com/qoomon/git-conventional-commits)**  A CLI util to ensure these
   conventions and generate changelogs

    <img src="https://img.icons8.com/dusk/1600/commit-git.png" width="200" height="200"  alt=""/>

   ##### Commit Message Formats

   ###### Default
    <pre>
    <b><a href="#types">&lt;type&gt;</a></b>(<b><a href="#scopes">&lt;optional scope&gt;</a></b>): <b><a href="#description">&lt;description&gt;</a></b>
    <sub>empty separator line</sub>
    <b><a href="#body">&lt;optional body&gt;</a></b>
    <sub>empty separator line</sub>
    <b><a href="#footer">&lt;optional footer&gt;</a></b>
    </pre>

   ###### Types
    * `feat` Commits, that adds or remove a new feature
    * `fix` Commits, that fixes a bug
    * `refactor` Commits, that rewrite/restructure your code, however does not change any API behaviour
        * `perf` Commits are special
        * `refactor` commits, that improve performance
    * `style` Commits, that do not affect the meaning (white-space, formatting, missing semi-colons, etc)
    * `test` Commits, that add missing tests or correcting existing tests
    * `docs` Commits, that affect documentation only
    * `build` Commits, that affect build components like build tool, ci pipeline, dependencies, project version, ...
    * `ops` Commits, that affect operational components like infrastructure, deployment, backup, recovery, ...
    * `chore` Miscellaneous commits e.g. modifying `.gitignore`

   ###### Scopes
   The `scope` provides additional contextual information.
    * Is an **optional** part of the format
    * Allowed Scopes depends on the specific project
    * Don't use issue identifiers as scopes

   ###### Breaking Changes Indicator
   Breaking changes should be indicated by an `!` before the `:` in the subject line
   e.g. `feat(api)!: remove status endpoint`
    * Is an **optional** part of the format

   ###### Description
   The `description` contains a concise description of the change.
    * Is a **mandatory** part of the format
        * Use the imperative, present tense: "change" not "changed" nor "changes"
        * Think of `This commit will...` or `This commit should...`
        * Don't capitalize the first letter
        * No dot (`.`) at the end

   ###### Body
   The `body` should include the motivation for the change and contrast this with previous behavior.
    * Is an **optional** part of the format
        * Use the imperative, present tense: "change" not "changed" nor "changes"
        * This is the place to mention issue identifiers and their relations

   ###### Footer
   The `footer` should contain any information about **Breaking Changes** and is also the place to **reference Issues**
   that this commit refers to.
    * Is an **optional** part of the format
        * **optionally** reference an issue by its id.
        * **Breaking Changes** should start with the word `BREAKING CHANGES:` followed by space or two newlines. The
          rest of the commit message is then used for this.

   ###### Examples
    * ```
        feat: add email notifications on new direct messages
        ```
    * ```
        feat(shopping cart): add the amazing button
        ```
    * ```
        feat!: remove ticket list endpoint
    
        refers to JIRA-1337
    
        BREAKING CHANGES: ticket enpoints no longer supports list all entites.
        ```
    * ```
        fix(api): handle empty message in request body
        ```
    * ```
        fix(api): fix wrong calculation of request body checksum
        ```
    * ```
        fix: add missing parameter to service call
    
        The error occurred because of <reasons>.
        ```
    * ```
        perf: decrease memory footprint for determine uniqe visitors by using HyperLogLog
        ```
    * ```
        build: update dependencies
        ```
    * ```
        build(release): `bump version to 1.0.0
        ```
    * ```
        refactor: implement fibonacci number calculation as recursion
        ```
    * ```
        style: remove empty line
        ```

7. Push change to fork and don't push to master like 'git push origin master', or you blocked by rule (always check
   branch with steps 2, so push will hit remote branch that role rule targeted):

   ```bash
   git push
   ```

8. Do Pull Request from your fork to main repository to discuss the change with your team:
    - Open your fork in your repository, if in there has notification to compare and pull request hit that button in
      there
    - Create pull request from your fork to main repository branch master

9. (Optional) if when pull had problem with "merge using **ort** strategy", like merge commit with no actual changes
   make your work tree dirty, do this:
   ```bash
   git config pull.ff only
   ``` 
   Note: if there is error when pull, because git config pull.ff=only, do this:
    ```bash
    git config pull.rebase false
    ```

### **🗒 Note :**

---

- If there are update change in your fork, always synced that, because you cannot push and crate pull request without
  that
- When Checkout, Push or Pull, always check your git branch is related to your Role
- Don't push to master with 'git push origin master' when add code change to GitHub
- Always create Pull request like steps 8
- if in Discord that connected with webhook had notify about pull request, you can join discussion and review your teams
  code 

