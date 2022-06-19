using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using MVCworkorderDB.Models;

namespace MVCworkorderDB.Controllers
{
    public class ManagersController : Controller
    {
        private Model2 db = new Model2();

        // GET: Managers
        public ActionResult Index()
        {
            var managers = db.managers.Include(s => s.departments);
            return View(managers.ToList());
        }

        // GET: Managers/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            managers managers = db.managers.Find(id);
            if (managers == null)
            {
                return HttpNotFound();
            }
            return View(managers);
        }

        // GET: Managers/Create
        public ActionResult Create()
        {
            ViewBag.department_id = new SelectList(db.departments, "id", "name");
            return View();
        }

        // POST: Managers/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "roll_num,first_name,last_name,department_id,phone,admission_date,cet_companys")] managers managers)
        {
            if (ModelState.IsValid)
            {
                db.managers.Add(managers);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.department_id = new SelectList(db.departments, "id", "name", managers.department_id);
            return View(managers);
        }

        // GET: Managers/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            managers managers = db.managers.Find(id);
            if (managers == null)
            {
                return HttpNotFound();
            }
            ViewBag.department_id = new SelectList(db.departments, "id", "name", managers.department_id);
            return View(managers);
        }

        // POST: Managers/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "roll_num,first_name,last_name,department_id,phone,admission_date,cet_companys")] managers managers)
        {
            if (ModelState.IsValid)
            {
                db.Entry(managers).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.department_id = new SelectList(db.departments, "id", "name", managers.department_id);
            return View(managers);
        }

        // GET: Managers/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            managers managers = db.managers.Find(id);
            if (managers == null)
            {
                return HttpNotFound();
            }
            return View(managers);
        }

        // POST: Managers/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            managers managers = db.managers.Find(id);
            db.managers.Remove(managers);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }


    
}
